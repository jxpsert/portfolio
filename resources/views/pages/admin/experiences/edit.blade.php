@extends('pages.admin.layout')

@section('title', __('Experiences'))

@section('content')

    <h1>{{ __('Edit :resource', ['resource' => __('Experience')]) }}</h1>

    <form method="POST" action="{{ route('admin.experiences.destroy', $experience) }}">
        @csrf
        @method('DELETE')

        <a href="{{ route('admin.experiences.index') }}" class="btn btn-sm btn-dark"><i
                class="bi bi-arrow-left"></i>&nbsp;{{ __('Back') }}</a>

        <button type="submit" class="btn btn-sm btn-danger">
            <i class="bi bi-trash"></i>&nbsp;{{ __('Delete') }}
        </button>
    </form>

    <br>

    <form method="POST" action="{{ route('admin.experiences.update', [$experience]) }}">
        @csrf

        <div class="form-group">
            <label for="type">{{ __('experiences.type') }}</label>
            <select id="type" class="form-control bg-light @error('type') is-invalid @enderror" name="type" required
                autofocus>
                <option value="work" @if ($experience->type == 'work') selected @endif>{{ __('Work') }}</option>
                <option value="education" @if ($experience->type == 'education') selected @endif>{{ __('Education') }}</option>
            </select>
            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="company_id">{{ __('experiences.company') }}</label>
            <select id="company_id" class="form-control bg-light @error('company_id') is-invalid @enderror"
                name="company_id" required autofocus>
                @foreach ($companies as $id => $company)
                    <option value="{{ $id }}" @if ($id == $experience->company_id) selected @endif>
                        {{ $company }}
                    </option>
                @endforeach
            </select>
            @error('company_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <label for="start">{{ __('experiences.start') }}</label>
                    <input id="start" type="date" class="form-control bg-light @error('start') is-invalid @enderror"
                        name="start" value="{{ $experience->start }}" required autofocus>
                    @error('start')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="end">{{ __('experiences.end') }}</label>
                    <input id="end" type="date" class="form-control bg-light @error('end') is-invalid @enderror"
                        name="end" value="{{ $experience->end }}" autofocus>
                    @error('end')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group mt-3">
            <label for="title">{{ __('experiences.title') }}</label>
            <input id="title" type="text" class="form-control bg-light @error('title') is-invalid @enderror"
                name="title" value="{{ $experience->title }}" required autofocus>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="city">{{ __('experiences.city') }}</label>
            <input id="city" type="text" class="form-control bg-light @error('city') is-invalid @enderror"
                name="city" value="{{ $experience->city }}" required autofocus>
            @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="description">{{ __('experiences.description') }}</label>
            <textarea id="description" rows="5" class="form-control bg-light @error('description') is-invalid @enderror"
                name="description" required autofocus>{{ $experience->description }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="categories">{{ __('projects.categories') }}</label>
            <select id="categories" class="form-control bg-light @error('categories') is-invalid @enderror"
                name="categories[]" multiple required autofocus>
                @foreach ($categories as $id => $category)
                    <option value="{{ $id }}" @if ($experience->categories->contains($id)) selected @endif>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </form>

@endsection
