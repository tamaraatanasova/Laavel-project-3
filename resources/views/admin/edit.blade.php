@extends('layouts.main')

@section('content')
    <div class="container min-vh-75">
        <div class="mt-5">
            @include('partials.admin.navbar')
        </div>

        <div class="row mt-5">
            <div class="col-12 my-3">
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-12 col-sm-6 col-md-4 mb-4 d-flex justify-content-center">
                            <div class="card" style="width: 30rem;" onclick="toggleButtons({{ $project->id }})">
                                <div class="card_a">
                                    <img src="{{ asset($project->image) }}" class="card-img-top py-2 px-5"
                                        alt="{{ $project->name }}" style="height: 180px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ $project->name }}</h5>
                                        <h6 class="card-subtitle mb-3 text-muted">{{ $project->subtitle }}</h6>
                                        <p class="card-text">{{ $project->description }}</p>

                                        <div id="buttons-{{ $project->id }}" class="d-none">
                                            <button class="btn btn-secondary btn-sm"
                                                onclick="editProject({{ $project->id }})">Edit</button>
                                            <button class="btn btn-secondary btn-sm"
                                                onclick="confirmDelete({{ $project->id }})" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Delete Confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this project?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST"
                        action="{{ route('project.destroy', ['project' => $project->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal for Project -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" enctype="multipart/form-data"
                        action="{{ route('projects.update', ['id' => ':id']) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit-name" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="edit-name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-subtitle" class="form-label">Subtitle</label>
                            <input type="text" class="form-control" id="edit-subtitle" name="subtitle">
                        </div>
                        <div class="mb-3">
                            <label for="edit-description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit-description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit-url" class="form-label">URL</label>
                            <input type="url" class="form-control" id="edit-url" name="url">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submitEditButton">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    function toggleButtons(projectId) {
        const buttons = document.getElementById('buttons-' + projectId);
        buttons.classList.toggle('d-none');
    }

    function confirmDelete(projectId) {
        const form = document.getElementById('deleteForm');
        form.action = '{{ route('project.destroy', ':id') }}'.replace(':id', projectId);
    }


    function editProject(projectId) {
    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();

    // Fetch project data
    fetch(`/projects/${projectId}/edit`)
        .then(response => response.json())
        .then(project => {
            // Populate the form with project data
            document.getElementById('edit-name').value = project.name;
            document.getElementById('edit-subtitle').value = project.subtitle;
            document.getElementById('edit-description').value = project.description;
            document.getElementById('edit-url').value = project.url;

            // Update form action with the correct project ID
            const editForm = document.getElementById('editForm');
            editForm.action = editForm.action.replace(':id', project.id); // Update the action URL with the correct ID
        })
        .catch(error => console.error('Error fetching project data:', error));
}



    document.getElementById('editForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Get the form data
        const formData = new FormData(this);

        // Send the form data via AJAX
        fetch(this.action, {
                method: 'PUT', // Method should be PUT for updates
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            })
            .then(response => response.json())
            .then(data => {
                // Handle success
                if (data.success) {
                    // Close the modal
                    const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                    editModal.hide();

                    // Optionally update the project in the UI without reloading
                    const updatedProject = data.project;
                    const projectCard = document.getElementById('project-card-' + updatedProject.id);
                    projectCard.querySelector('.card-title').textContent = updatedProject.name;
                    projectCard.querySelector('.card-subtitle').textContent = updatedProject.subtitle;
                    projectCard.querySelector('.card-text').textContent = updatedProject.description;
                } else {
                    alert('Failed to update the project');
                }
            })
            .catch(error => {
                console.error('Error submitting form:', error);
            });
    });
    
</script>
