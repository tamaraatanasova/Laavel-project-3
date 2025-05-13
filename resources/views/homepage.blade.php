@extends('layouts.main')

@section('content')

    <div class="hero">
        <h1 class="mb-4">Brainster.xyz Labs</h1>
        <p>Проекти од академиите на Brainster</p>
    </div>

    @include('partials.validation_errors')
    @include('partials.validation_success')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 my-3">
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-12 col-sm-6 col-md-4 mb-4 d-flex justify-content-center">
                            <div class="card" style="width: 30rem;">
                                <a href="{{ $project->url }}" class="card_a">
                                    <img src="{{ asset($project->image) }}" class="card-img-top py-2 px-5" alt="{{ $project->name }}" style="height: 180px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ $project->name }}</h5>
                                        <h6 class="card-subtitle mb-3 text-muted">{{ $project->subtitle }}</h6>
                                        <p class="card-text">{{ $project->description }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>

@endsection
