@extends('layouts.main')

@section('content')
    <div class="container min-vh-75 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.login') }}" class="p-4 shadow rounded bg-white">
                @csrf
                
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif

                <div class="d-grid">
                    <button type="submit" class="btn btn-yellow w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
