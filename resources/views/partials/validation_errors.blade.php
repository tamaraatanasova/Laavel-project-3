
@if ($errors->any())
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    @foreach ($errors->all() as $error)
        <div class="toast show bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ $error }}
            </div>
        </div>
    @endforeach
</div>
@endif
