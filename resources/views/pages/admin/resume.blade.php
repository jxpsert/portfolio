<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ setting('site_name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            font-family: "Noto Sans";
            box-sizing: border-box;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .font-serif {
            font-family: "Noto Serif";
        }

        body {
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 0 1rem;
            width: 100%;
        }

        .ta-s {
            text-align: start;
        }

        .ta-e {
            text-align: end;
        }

        .ta-c {
            text-align: center;
        }

        .lst-n {
            list-style-type: none;
        }

        ul.experience-list {
            padding-left: 1rem;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mt-0 {
            margin-top: 0;
        }

        .mt-2 {
            margin-top: 2rem;
        }

        .experience-list>li {
            display: flex;
            flex-direction: row;
        }

        .experience-list>li>div:nth-child(1) {
            flex: 3;
        }

        .experience-list>li>div:nth-child(2) {
            display: flex;
            justify-content: end;
            align-items: center;
            flex: 1;
        }

        .fst-italic {
            font-style: italic;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container ta-c">
        <div class="no-print mt-2">
            <a href="{{ route('admin.dashboard') }}"><i class="bi bi-arrow-left-short"></i> {{ __('Back') }}</a>
        </div>
        <h1>{{ setting('site_name') }}</h1>
        <p>{{ setting('title') }} &centerdot; {{ setting('location') }}</p>
        <p>
            @if (setting('phone') != '')
                <i class="bi bi-telephone-fill"></i> {{ setting('phone') }}
            @endif
            @if (setting('phone') != '' && setting('email') != '')
                &nbsp;
            @endif
            @if (setting('email') != '')
                <i class="bi bi-envelope-fill"></i> {{ setting('email') }}
            @endif
        </p>
        <hr>

        <h2 class="ta-s">{{ __('Work experience') }}</h2>

        <ul class="lst-n experience-list">
            @foreach ($workExperience as $experience)
                <x-resume-experience :experience="$experience" />
            @endforeach
        </ul>

        <h2 class="ta-s">{{ __('Education') }}</h2>

        <ul class="lst-n experience-list">
            @foreach ($educationExperience as $experience)
                <x-resume-experience :experience="$experience" />
            @endforeach
        </ul>
    </div>
</body>

<script>
    window.print();
</script>


</html>
