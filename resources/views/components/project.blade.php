@props(['project'])
<div class="experience-card">
    <span class="fs-4 fw-bold">{{ $project->title }}</span>
    @if ($project->subtitle)
        <span class="text-muted fs-6">{{ $project->subtitle }}</span>
    @endif
    <a href="{{ route('projects.show', $project) }}"><img class="img-fluid project-image mb-2"
            src="{{ asset('assets/projects/' . $project->id . '.png') }}"></a>

    @if ($project->github)
        <a href="{{ $project->github }}" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover"
            target="_blank"><i class="bi bi-github"></i>&nbsp;GitHub</a>
    @endif

    @if ($project->github && $project->url)
        &centerdot;
    @endif

    @if ($project->url)
        <a href="{{ $project->url }}" class="link-dark link-underline-opacity-0 link-underline-opacity-75-hover"
            target="_blank"><i class="bi bi-globe"></i>&nbsp;Website</a>
    @endif
</div>
