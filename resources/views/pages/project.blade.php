<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <title>{{ $project->title }} - Jasper Platenburg</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jasper Platenburg">
    <meta name="description" content="Software developer in opleiding">
    <meta name="keywords" content="jasper, platenburg, kw1c, software developer">
    <meta charset="UTF-8">

    <meta property="og:title" content="Jasper Platenburg">
    <meta property="og:description" content="Software developer in opleiding">
    <meta property="og:image" content="{{ asset('assets/images/images/headshot.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="nl_NL">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="container vh-100 bg-dark pt-3">
        <a href="/" class="btn-link text-white"><i class="bi bi-arrow-left"></i>&nbsp;Terug</a>
        <div class="row text-white mt-3">
            <div class="col-12 col-md-4">
                <h1 class="text-white fw-bold" id="project-title">
                    {{ $project->title }}
                </h1>
                <p id="project-description">
                    @php
                        $description = app(Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml(
                            $project->description,
                        );
                        $description = str_replace('\\n', '<br>', $description);
                        $description = str_replace('<a ', '<a target="_blank" ', $description);
                    @endphp
                    {!! $description !!}
                </p>
                <br>
                <h5>Gebruikte technologieën</h5>
                <ul id="project-technologies" class="horizontal">
                    @foreach ($project->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-8">
                <img id="project-image" src="{{ asset('assets/projects/' . $project->id . '.png') }}"
                    alt="Project image" class="img-fluid rounded border border-1 border-secondary">
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($project->url)
                    <a id="project-website" target="_blank" href="{{ $project->url }}" class="btn btn-secondary"><i
                            class="bi bi-globe"></i>&nbsp;Website</a>
                @endif

                @if ($project->github)
                    <a id="project-github" target="_blank" href="{{ $project->github }}" class="btn btn-secondary"><i
                            class="bi bi-github"></i>&nbsp;GitHub</a>
                @endif
            </div>
        </div>
        @if ($relatedProjects)
            <h2 class="text-white mt-3">Andere projecten</h2>
            <div id="otherProjects" class="row row-cols-1 row-cols-md-3 g-3">
                @foreach ($relatedProjects as $relatedProject)
                    <div class="col">
                        <a href="{{ route('projects.show', $relatedProject) }}" class="text-white link-underline-none">
                            <div class="project-image-container">
                                <img src="{{ asset('assets/projects/' . $relatedProject->id . '.png') }}"
                                    class="img-fluid rounded border border-1 border-secondary"
                                    alt="{{ $relatedProject->title }}">
                            </div>
                            <h5>{{ $relatedProject->title }}</h5>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>

</html>
