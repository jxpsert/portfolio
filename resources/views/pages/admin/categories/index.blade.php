@extends('pages.admin.layout')

@section('title', __('Categories'))

@section('content')

    <h1>{{ __('Categories') }}</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-dark"><i
            class="bi bi-plus"></i>&nbsp;{{ __('Add') }}</a>

    <table class="table table-light table-striped">
        <thead>
            <tr>
                <th>{{ __('categories.name') }}</th>
                <th class="text-end">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.categories.edit', $category) }}"
                            class="btn btn-warning">{{ __('Edit') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
