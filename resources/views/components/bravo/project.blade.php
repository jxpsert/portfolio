@props(['project'])
<div class="project-card">
    <div class="project-title"><span class="fs-5 fw-bold">{{ $project->title }}</span>
        @if ($project->subtitle)
            <span class="text-muted fs-6">{{ $project->subtitle }}</span>
        @endif
    </div>

    <a href="{{ route('projects.show', $project) }}"><img class="img-fluid project-image"
            src="{{ asset('storage/assets/projects/' . $project->id . '.png') }}"></a>
</div>
