<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <title>Links - {{ setting('site_name') }}</title>
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

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="container vh-100 bg-dark pt-3 text-white text-center">
        <h1>{{ setting('site_name') }}</h1>
        <p>{{ __('All my links in one place') }}</p>

        <ul class="list-unstyled w-100">
            <li>
                <a target="_blank" href="https://instagram.com/jxpsert" class="btn btn-outline-light w-50 py-3 mb-4">
                    <i class="bi bi-instagram"></i>&nbsp;Instagram (persoonlijk)
                </a>

                <a target="_blank" href="https://instagram.com/parkeerfuck"
                    class="btn btn-outline-light w-50 py-3 mb-4">
                    <i class="bi bi-instagram"></i>&nbsp;Instagram (parkeerfuck)
                </a>

                <a target="_blank" href="https://twitter.com/jxpsert" class="btn btn-outline-light w-50 py-3 mb-4">
                    <i class="bi bi-twitter"></i>&nbsp;Twitter
                </a>

                <a target="_blank" href="https://snapchat.com/add/jxpsert" class="btn btn-outline-light w-50 py-3 mb-4">
                    <i class="bi bi-snapchat"></i>&nbsp;Snapchat
                </a>

                <a target="_blank" href="https://letterboxd.com/jxpsert" class="btn btn-outline-light w-50 py-3 mb-4">
                    <i class="bi bi-film"></i>&nbsp;Letterboxd
                </a>

                <a target="_blank" href="mailto:jasper@platenburg.dev" class="btn btn-outline-light w-50 py-3 mb-4">
                    <i class="bi bi-envelope"></i>&nbsp;Email
                </a>
            </li>
        </ul>
    </div>

</body>
