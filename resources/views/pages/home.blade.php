<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <title>{{ setting('site_name') }}</title>

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

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row vh-100 mh-100">
            <div id="sidebar" class="col-12 col-md-3 bg-dark text-white sticky-top h-100">
                <div class="container pt-3">
                    <div class="text-center">
                        <img alt="Foto van gezicht" src="{{ asset('assets/images/headshot.png') }}"
                            class="headshot mt-4 mt-md-3">
                        <h1 class="fw-bold mt-4">{{ setting('site_name') }}</h1>
                        <span class="fs-5">{{ setting('title') }}</span>
                    </div>

                    <div class="px-2 mt-5 m-auto">
                        <ul class="list-unstyled fs-5">
                            <li>
                                <i class="bi bi-cake2"></i> april 2005 (<span id="age"></span>)
                            </li>
                            @if (!empty(setting('location')))
                                <li>
                                    <i class="bi bi-house"></i> {{ setting('location') }}
                                </li>
                            @endif
                            @if (!empty(setting('email')))
                                <li>
                                    <i class="bi bi-envelope-at"></i>
                                    <a href="mailto:{{ setting('email') }}" class="link-light text-decoration-none">
                                        {{ setting('email') }}
                                    </a>
                                </li>
                            @endif
                            @if (!empty(setting('phone')))
                                <li>
                                    <i class="bi bi-telephone"></i>
                                    <a href="tel:{{ trim(str_replace(' ', '', setting('phone'))) }}"
                                        class="link-light text-decoration-none">
                                        {{ setting('phone') }}
                                    </a>
                                </li>
                            @endif

                            <li class="mt-4">
                            </li>

                            @if (!empty(setting('github')))
                                <li>
                                    <i class="bi bi-github"></i>
                                    <a href="{{ setting('github') }}" class="link-light text-decoration-none"
                                        target="_blank">
                                        GitHub
                                    </a>
                                </li>
                            @endif

                            @if (!empty(setting('linkedin')))
                                <li>
                                    <i class="bi bi-linkedin"></i>
                                    <a href="{{ setting('linkedin') }}" class="link-light text-decoration-none"
                                        target="_blank">
                                        LinkedIn
                                    </a>
                                </li>
                            @endif

                        </ul>
                        <div class="text-center d-md-none">
                            <small><a href="#content">{{ strtolower(__('More')) }}</a></small><br>
                            <i class="bi bi-arrow-down"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div id="content" class="col-12 col-md-9 ms-auto bg-white">
                <div class="container py-5">
                    <div class="row row-cols-1 row-cols-md-2 mb-2">
                        <div class="col">
                            <section id="work-experience">
                                <h2>Werkervaring</h2>
                                <ul id="jobsList" class="list-unstyled timeline">
                                    @foreach ($workExperiences as $experience)
                                        <x-experience :experience="$experience" />
                                    @endforeach
                                </ul>
                            </section>
                        </div>

                        <div class="col">
                            <section id="education">
                                <h2>Opleiding</h2>
                                <ul id="educationList" class="list-unstyled timeline">
                                    @foreach ($educationExperiences as $experience)
                                        <x-experience :experience="$experience" />
                                    @endforeach
                                </ul>
                            </section>
                        </div>
                    </div>

                    <section id="projects">
                        <h2>Projecten</h2>
                        <div class="row row-cols-1 row-cols-md-3 g-3 ps-md-4" id="projectsContainer">
                            @foreach ($projects as $project)
                                <div class="col">
                                    <x-project :project="$project" />
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
