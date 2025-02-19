<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <title>{{ $project->title }} - {{ setting('site_name') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ setting('site_name') }}">
    <meta name="description" content="{{ setting('title') }}">
    <meta name="keywords" content="jasper, platenburg, kw1c, software developer">
    <meta charset="UTF-8">

    <meta property="og:title" content="{{ setting('site_name') }}">
    <meta property="og:description" content="{{ setting('title') }}">
    <meta property="og:image" content="{{ asset('assets/images/images/headshot.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="nl_NL">

    <script defer data-domain="jasperplatenburg.nl" src="https://plausible.platenburg.dev/js/script.outbound-links.js">
    </script>

    @vite(['resources/css/app.css', 'resources/css/app-' . setting('frontend_theme') . '.css', 'resources/js/app.js'])

</head>

<body>
    <div class="container pt-3">
        <a href="/" class="btn-link"><i class="bi bi-arrow-left"></i>&nbsp;{{ __('Back') }}</a>
        <div class="row mt-3">
            <div class="col-12 col-md-4">
                <h1 class="fw-bold" id="project-title">
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
                @if ($project->categories->count() > 0)
                    <h5>Gebruikte technologieën</h5>
                    <ul id="project-technologies" class="horizontal">
                        @foreach ($project->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-12 col-md-8">
                <img id="project-image" src="{{ asset('storage/assets/projects/' . $project->id . '.png') }}"
                    alt="Project image" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($project->url)
                    <a id="project-website" target="_blank" href="{{ $project->url }}" class="btn btn-light"><i
                            class="bi bi-globe"></i>&nbsp;Website</a>
                @endif

                @if ($project->github)
                    <a id="project-github" target="_blank" href="{{ $project->github }}" class="btn btn-light"><i
                            class="bi bi-github"></i>&nbsp;GitHub</a>
                @endif
            </div>
        </div>
        @if ($relatedProjects)
            <h2 class="mt-2">{{ __('Other projects') }}</h2>
            <div class="row row-cols-1 row-cols-lg-3 g-0" id="otherProjects">
                @foreach ($relatedProjects as $project)
                    <div class="col">
                        <x-bravo.project :project="$project" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="container text-center py-4">
        &copy; 2025 &centerdot; {{ setting('site_name') }}
    </div>

</body>

</html>
