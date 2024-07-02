<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Capolyo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

    <div class="row min-vh-100 h-100 overflow-y-hidden">
        <div class="col-2 bg-dark">
            <div class="container mt-3">
                <div class="sidebar-menu">
                    @php
                        $activeRoute = Route::is('admin.dashboard') ? 'active' : '';
                    @endphp
                    <a href="{{ route('admin.dashboard') }}"
                        class="menu-item {{ $activeRoute }}">{{ __('Dashboard') }}</a>

                    @php
                        $activeRoute = Route::is('admin.experiences.*') ? 'active' : '';
                    @endphp
                    <a href="{{ route('admin.experiences.index') }}"
                        class="menu-item {{ $activeRoute }}">{{ __('Experiences') }}</a>

                    @php
                        $activeRoute = Route::is('admin.projects.*') ? 'active' : '';
                    @endphp
                    <a href="{{ route('admin.projects.index') }}"
                        class="menu-item {{ $activeRoute }}">{{ __('Projects') }}</a>

                    @php
                        $activeRoute = Route::is('admin.categories.*') ? 'active' : '';
                    @endphp
                    <a href="{{ route('admin.categories.index') }}"
                        class="menu-item {{ $activeRoute }}">{{ __('Categories') }}</a>

                    @php
                        $activeRoute = Route::is('admin.companies.*') ? 'active' : '';
                    @endphp
                    <a href="{{ route('admin.companies.index') }}"
                        class="menu-item {{ $activeRoute }}">{{ __('Companies') }}</a>

                    @php
                        $activeRoute = Route::is('admin.settings.*') ? 'active' : '';
                    @endphp
                    <a href="{{ route('admin.settings.index') }}"
                        class="menu-item {{ $activeRoute }}">{{ __('Settings') }}</a>

                    <a target="_blank" href="{{ route('home') }}" class="menu-item">{{ __('View site') }}<i
                            class="bi bi-box-arrow-up-right ms-2"></i></a>
                    <a href="{{ route('admin.logout') }}" class="menu-item">{{ __('auth.logout') }}</a>
                </div>
            </div>
        </div>
        <div class="col-10 overflow-y-auto pt-4 pb-4">
            <div class="px-5">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
