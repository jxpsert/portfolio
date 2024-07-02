@extends('pages.admin.layout')

@section('title', __('Projects'))

@section('content')

    <h1>{{ __('Projects') }}</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-dark"><i
            class="bi bi-plus"></i>&nbsp;{{ __('Add') }}</a>

    <table class="table table-light table-striped">
        <thead>
            <tr>
                <th>{{ __('projects.image') }}</th>
                <th>{{ __('projects.title') }}</th>
                <th>{{ __('projects.description') }}</th>
                <th class="text-end">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td><img src="{{ asset('storage/assets/projects/' . $project->id . '.png') }}"
                            class="project-index-image"></td>
                    <td>
                        {{ $project->title }}
                        @if ($project->subtitle)
                            <br>
                            <small class="fst-italic">{{ $project->subtitle }}</small>
                        @endif
                    </td>
                    <td>
                        {{ strlen($project->description) > 40 ? substr($project->description, 0, 40) . '...' : $project->description }}
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.projects.edit', $project) }}"
                            class="btn btn-warning">{{ __('Edit') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
