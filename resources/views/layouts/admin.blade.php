<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Trang quản trị')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar-admin fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo / Brand -->
            <a class="navbar-brand" href="{{ route('admin.home') }}">
                <i class="bi bi-building"></i> VLXD - Admin
            </a>

            <!-- User info + Logout -->
            @if (session('user'))
                <div class="d-flex align-items-center">
                    <span class="text-light me-3">
                        <i class="bi bi-person-circle"></i> {{ session('user')->TENDANGNHAP }}
                    </span>
                    <a href="{{ route('logout') }}" class="btn btn-admin btn-sm">Logout</a>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-admin btn-sm">Login</a>
            @endif
        </div>
    </nav>
    <!-- Nội dung admin -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-admin');
            if (window.scrollY > 50) {
                navbar.classList.add('shrink');
            } else {
                navbar.classList.remove('shrink');
            }
        });
    </script>


</body>

</html>
