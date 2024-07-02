@extends('pages.admin.layout')

@section('title', __('Companies'))

@section('content')

    <h1>{{ __('Add :resource', ['resource' => __('Company')]) }}</h1>
    <a href="{{ route('admin.companies.index') }}" class="btn btn-sm btn-dark"><i
            class="bi bi-arrow-left"></i>&nbsp;{{ __('Back') }}</a>

    <br>
    <br>

    <form method="POST" action="{{ route('admin.companies.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">{{ __('companies.name') }}</label>
            <input id="name" type="text" class="form-control bg-light @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="url">{{ __('companies.url') }}</label>
            <input id="url" type="text" class="form-control bg-light @error('url') is-invalid @enderror"
                name="url" value="{{ old('url') }}" required autofocus>
            @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="logo">{{ __('companies.logo') }}</label>
            <input id="logo" type="file" accept=".png"
                class="form-control bg-light @error('logo') is-invalid @enderror" name="logo" required autofocus>
            @error('logo')
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
