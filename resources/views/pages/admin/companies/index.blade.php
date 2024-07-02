@extends('pages.admin.layout')

@section('title', __('Companies'))

@section('content')
    <h1>{{ __('Companies') }}</h1>
    <a href="{{ route('admin.companies.create') }}" class="btn btn-sm btn-dark"><i
            class="bi bi-plus"></i>&nbsp;{{ __('Add') }}</a>

    <table class="table table-light table-striped">
        <thead>
            <tr>
                <th>{{ __('companies.logo') }}</th>
                <th>{{ __('companies.name') }}</th>
                <th>{{ __('companies.url') }}</th>
                <th class="text-end">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td class="text-center"><img src="{{ asset('storage/assets/logos/' . $company->id . '.png') }}"
                            class="company-index-logo"></td>
                    <td>{{ $company->name }}</td>
                    <td><a target="_blank" href="{{ $company->url }}">{{ $company->url }}</a></td>
                    <td class="text-end">
                        <a href="{{ route('admin.companies.edit', $company) }}"
                            class="btn btn-warning">{{ __('Edit') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
