@extends('pages.admin.layout')

@section('title', __('Projects'))

@section('content')

    <h1>{{ __('Add :resource', ['resource' => __('Project')]) }}</h1>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-dark"><i
            class="bi bi-arrow-left"></i>&nbsp;{{ __('Back') }}</a>

    <br>
    <br>

    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="slug">{{ __('projects.slug') }}</label>
            <input id="slug" type="text" class="form-control bg-light @error('slug') is-invalid @enderror"
                name="slug" value="{{ old('slug') }}" required autofocus>
            @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="title">{{ __('projects.title') }}</label>
            <input id="title" type="text" class="form-control bg-light @error('title') is-invalid @enderror"
                name="title" value="{{ old('title') }}" required autofocus>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="subtitle">{{ __('projects.subtitle') }}</label>
            <input id="subtitle" type="text" class="form-control bg-light @error('subtitle') is-invalid @enderror"
                name="subtitle" value="{{ old('subtitle') }}" autofocus>
            @error('subtitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="description">{{ __('projects.description') }}</label><br>
            <small class="fst-italic">{{ __('projects.description_help') }}</small>
            <textarea id="description" rows="5" class="form-control bg-light @error('description') is-invalid @enderror"
                name="description" required autofocus>{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="url">{{ __('projects.url') }}</label>
            <input id="url" type="text" class="form-control bg-light @error('url') is-invalid @enderror"
                name="url" value="{{ old('url') }}" autofocus>
            @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="github">{{ __('projects.github') }}</label>
            <input id="github" type="text" class="form-control bg-light @error('github') is-invalid @enderror"
                name="github" value="{{ old('github') }}" autofocus>
            @error('github')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="image">{{ __('projects.image') }}</label>
            <input id="image" type="file" accept=".png"
                class="form-control bg-light @error('image') is-invalid @enderror" name="image" required autofocus>
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </form>

@endsection
