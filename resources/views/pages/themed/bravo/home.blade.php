<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <title>{{ setting('site_name') }}</title>
    @php
        $keywords = [];
        $sitename = setting('site_name');
        $title = setting('title');

        $keywords = array_merge($keywords, explode(' ', $sitename));
        $keywords = array_merge($keywords, explode(' ', $title));
    @endphp

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ setting('site_name') }}">
    <meta name="description" content="{{ setting('title') }}">
    <meta name="keywords" content="{{ implode(', ', $keywords) }}">
    <meta charset="UTF-8">

    <meta property="og:title" content="{{ setting('site_name') }}">
    <meta property="og:description" content="{{ setting('title') }}">
    <meta property="og:image" content="{{ asset('storage/assets/photo.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="nl_NL">

    <script defer data-domain="jasperplatenburg.nl" src="https://plausible.platenburg.dev/js/script.outbound-links.js">
    </script>

    @vite(['resources/css/app.css', 'resources/css/app-' . setting('frontend_theme') . '.css', 'resources/js/app.js'])

</head>

<body>
    <div class="container-fluid vh-100 px-0 pb-5">
        <div class="container header text-center">
            @if (setting('show_photo'))
                <img alt="Foto van gezicht" src="{{ asset('storage/assets/photo.png') }}" class="headshot mt-4 mt-lg-3">
            @endif
            <h1 class="fw-bold mt-4">{{ setting('site_name') }}</h1>
            <span class="fs-5">{{ setting('title') }}</span>
            @if (!empty(setting('location')))
                <span class="mt-2 d-block">
                    <i class="bi bi-house-fill"></i> {{ setting('location') }}
                </span>
            @endif
        </div>

        <div class="container-fluid bg-dark text-white w-100 mt-3 py-3 text-center contact-container">
            @if (!empty(setting('email')))
                <span>
                    <i class="bi bi-envelope-at"></i>
                    <a href="mailto:{{ setting('email') }}" class="link-light text-decoration-none">
                        {{ setting('email') }}
                    </a>
                </span>
            @endif
            @if (!empty(setting('phone')))
                <span>
                    <i class="bi bi-telephone"></i>
                    <a href="tel:{{ trim(str_replace(' ', '', setting('phone'))) }}"
                        class="link-light text-decoration-none">
                        {{ setting('phone') }}
                    </a>
                </span>
            @endif
            @if (!empty(setting('github')))
                <span>
                    <i class="bi bi-github"></i>
                    <a href="{{ setting('github') }}" class="link-light text-decoration-none" target="_blank">
                        GitHub
                    </a>
                </span>
            @endif
            @if (!empty(setting('linkedin')))
                <span>
                    <i class="bi bi-linkedin"></i>
                    <a href="{{ setting('linkedin') }}" class="link-light text-decoration-none" target="_blank">
                        LinkedIn
                    </a>
                </span>
            @endif
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <section id="work-experience" class="mt-5">
                        <h2>Werkervaring</h2>
                        <ul id="jobsList" class="list-unstyled timeline">
                            @foreach ($workExperiences as $experience)
                                @if ($experience->start > \Carbon\Carbon::now())
                                    @continue
                                @endif
                                <x-bravo.experience :experience="$experience" />
                            @endforeach
                        </ul>
                    </section>
                </div>

                <div class="col-12 col-lg-6">
                    <section id="education" class="mt-5">
                        <h2 class="text-lg-end">Opleiding</h2>
                        <ul id="educationList" class="list-unstyled timeline">
                            @foreach ($educationExperiences as $experience)
                                @if ($experience->start > \Carbon\Carbon::now())
                                    @continue
                                @endif
                                <x-bravo.experience :experience="$experience" />
                            @endforeach
                        </ul>
                    </section>
                </div>
            </div>

            <section id="projects" class="mt-5">
                <h2>Projecten</h2>
                <div class="row row-cols-1 row-cols-lg-3 g-0" id="projectsContainer">
                    @foreach ($projects as $project)
                        <div class="col">
                            <x-bravo.project :project="$project" />
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

        <div class="container text-center py-4">
            &copy; 2025 &centerdot; {{ setting('site_name') }}
        </div>
    </div>


    </div>

</body>

</html>
