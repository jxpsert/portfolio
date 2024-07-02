<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PortCMS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

    <div class="row min-vh-100 h-100 overflow-y-hidden">
        <div class="col-2 bg-dark">
            <div class="container mt-3">
                <div class="sidebar-menu">
                    <a class="menu-item active">{{ __('Dashboard') }}</a>
                    <a class="menu-item">{{ __('Experiences') }}</a>
                    <a class="menu-item">{{ __('Projects') }}</a>
                    <a href="{{ route('admin.logout') }}" class="menu-item">{{ __('auth.logout') }}</a>
                </div>
            </div>
        </div>
        <div class="col-auto overflow-y-auto">
            @yield('content')
        </div>
    </div>
</body>

</html>
