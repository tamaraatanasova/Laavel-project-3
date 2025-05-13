@extends('layouts.main')

@section('content')
<div class="container min-vh-75">

    <div class="mt-5">
        @include('partials.admin.navbar')
    </div>

    <h2 class="mt-5 mb-3">Додај нов производ:</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-8">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Име</label>
                            <input type="text" name="name" class="form-control" required>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    
                        <div class="form-group">
                            <label for="subtitle">Поднаслов</label>
                            <input type="text" name="subtitle" class="form-control">
                            @if ($errors->has('subtitle'))
                                <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                            @endif
                        </div>
                    
                        <div class="form-group">
                            <label for="image">Слика</label>
                            <input type="text" name="image" class="form-control" placeholder="http://">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control" placeholder="http://">
                            @if ($errors->has('url'))
                                <span class="text-danger">{{ $errors->first('url') }}</span>
                            @endif
                        </div>
                    
                        <div class="form-group">
                            <label for="description">Опис</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    
                        <button type="submit" class="btn btn-yellow mt-3 w-100">Додај</button>
                    </form>
                    
                </div>
            </div>
        </div>
</div>
@endsection
