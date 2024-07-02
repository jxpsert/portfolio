@extends('pages.admin.layout')

@section('title', __('Experiences'))

@section('content')

    <h1>{{ __('Experiences') }}</h1>
    <a href="{{ route('admin.experiences.create') }}" class="btn btn-sm btn-dark"><i
            class="bi bi-plus"></i>&nbsp;{{ __('Add') }}</a>

    <table class="table table-light table-striped">
        <thead>
            <tr>
                <th>{{ __('experiences.type') }}</th>
                <th>{{ __('experiences.company') }}</th>
                <th>{{ __('experiences.title') }}</th>
                <th>{{ __('experiences.description') }}</th>
                <th>{{ __('experiences.duration') }}</th>
                <th class="text-end">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $experience)
                <tr>
                    <td>
                        @if ($experience->type == 'work')
                            <i class="bi bi-briefcase"></i>&nbsp;{{ __('Work') }}
                        @else
                            <i class="bi bi-mortarboard"></i>&nbsp;{{ __('Education') }}
                        @endif
                    </td>
                    <td>
                        {{ $experience->company->name }}
                    </td>
                    <td>
                        {{ $experience->title }}
                    </td>
                    <td>
                        {{ strlen($experience->description) > 40 ? substr($experience->description, 0, 40) . '...' : $experience->description }}
                        @if (!$experience->description)
                            -
                        @endif
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($experience->start)->format('M Y') }} -
                        {{ $experience->end ? \Carbon\Carbon::parse($experience->end)->format('M Y') : __('Present') }}
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.experiences.edit', $experience) }}"
                            class="btn btn-warning">{{ __('Edit') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
