<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'VLXD Store')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body>
    <nav class="navbar-user" id="navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">VLXD</a>
            <div>
                @if (session('user'))
                    <span class="text-light me-3">{{ session('user')->TENDANGNHAP }}</span>
                    <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                @endif
            </div>
        </div>
    </nav>


    <div class="container mt-4">
        @yield('content')
    </div>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shrink');
            } else {
                navbar.classList.remove('shrink');
            }
        });
    </script>
</body>

</html>
