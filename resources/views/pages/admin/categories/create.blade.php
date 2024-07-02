@extends('pages.admin.layout')

@section('title', __('Categories'))

@section('content')

    <h1>{{ __('Add :resource', ['resource' => __('Category')]) }}</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-dark"><i
            class="bi bi-arrow-left"></i>&nbsp;{{ __('Back') }}</a>

    <br>
    <br>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">{{ __('categories.name') }}</label>
            <input id="name" type="text" class="form-control bg-light @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
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
