@extends('pages.admin.layout')

@section('title', __('Projects'))

@section('content')

    <h1>{{ __('Edit :resource', ['resource' => __('Project')]) }}</h1>



    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}">
        @csrf
        @method('DELETE')

        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-dark"><i
                class="bi bi-arrow-left"></i>&nbsp;{{ __('Back') }}</a>

        <button type="submit" class="btn btn-sm btn-danger">
            <i class="bi bi-trash"></i>&nbsp;{{ __('Delete') }}
        </button>
    </form>

    <br>

    <form method="POST" action="{{ route('admin.projects.update', [$project]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="slug">{{ __('projects.slug') }}</label>
            <input id="slug" type="text" class="form-control bg-light @error('slug') is-invalid @enderror"
                name="slug" value="{{ $project->slug }}" required autofocus>
            @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="title">{{ __('projects.title') }}</label>
            <input id="title" type="text" class="form-control bg-light @error('title') is-invalid @enderror"
                name="title" value="{{ $project->title }}" required autofocus>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="subtitle">{{ __('projects.subtitle') }}</label>
            <input id="subtitle" type="text" class="form-control bg-light @error('subtitle') is-invalid @enderror"
                name="subtitle" value="{{ $project->subtitle }}" autofocus>
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
                name="description" required autofocus>{{ $project->description }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="url">{{ __('projects.url') }}</label>
            <input id="url" type="text" class="form-control bg-light @error('url') is-invalid @enderror"
                name="url" value="{{ $project->url }}" autofocus>
            @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="github">{{ __('projects.github') }}</label>
            <input id="github" type="text" class="form-control bg-light @error('github') is-invalid @enderror"
                name="github" value="{{ $project->github }}" autofocus>
            @error('github')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="logo" class="required">{{ __('projects.image') }}</label>
            <input id="logo" type="file" accept=".png"
                class="form-control bg-light @error('logo') is-invalid @enderror" name="logo" autofocus>
            @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            {{ __('Current') }}: <img src="{{ asset('storage/assets/projects/' . $project->id . '.png') }}"
                class="project-index-image">
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </form>

@endsection
