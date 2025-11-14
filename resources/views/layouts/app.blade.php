<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'VLXD Minh Hiếu - Vật Liệu Xây Dựng')</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts - Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <style>
        /* ============ TECH BLUE PRO COLORS ============ */
        :root {
            --primary: #0066FF;
            --secondary: #00B4D8;
            --background: #F8FAFC;
            --text: #1E293B;
            --border: #CBD5E1;
            --light: #EBF0F5;
            --dark-primary: #004FCC;
        }
        * {
            font-family: 'Roboto', sans-serif;
        }
        body {
            background-color: var(--background);
            color: var(--text);
        }

        /* ============ NAVBAR STYLES (giữ nguyên) ============ */
        .navbar-main {
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark-primary) 100%);
            box-shadow: 0 4px 20px rgba(0, 102, 255, 0.15);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        .navbar-main.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 8px 32px rgba(0, 102, 255, 0.2);
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .navbar-brand i {
            font-size: 1.8rem;
            color: var(--secondary);
        }
        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            margin: 0 0.5rem;
        }
        .navbar-nav .nav-link:hover {
            color: var(--secondary) !important;
        }
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: var(--secondary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }
        .navbar-nav .dropdown-menu {
            background-color: white;
            border: 1px solid var(--border);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 0.5rem 0;
        }
        .navbar-nav .dropdown-item {
            color: var(--text);
            padding: 0.75rem 1.5rem;
            transition: all 0.2s ease;
        }
        .navbar-nav .dropdown-item:hover {
            background-color: var(--light);
            color: var(--primary);
            padding-left: 1.75rem;
        }

        /* Search Bar */
        .search-box {
            background-color: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        .search-box:focus {
            background-color: rgba(255, 255, 255, 0.25);
            border-color: var(--secondary);
            box-shadow: 0 0 10px rgba(0, 180, 216, 0.5);
        }
        .search-box::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .btn-search {
            background-color: var(--secondary);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.2rem;
            transition: all 0.3s ease;
            margin-left: 0.5rem;
        }
        .btn-search:hover {
            background-color: #0096B3;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 180, 216, 0.4);
            color: white;
        }

        /* User Actions */
        .user-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .user-text {
            color: white;
            font-weight: 500;
            font-size: 0.95rem;
        }
        .btn-auth {
            background-color: var(--secondary);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 0.35rem 0.8rem;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }
        .btn-auth:hover {
            background-color: #0096B3;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 180, 216, 0.4);
            color: white;
        }
        .cart-icon {
            position: relative;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            background-color: rgba(0, 180, 216, 0.2);
            border-radius: 50%;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 1.2rem;
        }
        .cart-icon:hover {
            background-color: var(--secondary);
            color: white;
            transform: scale(1.1);
        }
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #FF4757;
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            min-width: 24px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(255, 71, 87, 0.4);
        }

        /* ============ SLIDEBAR MENU (MỚI) ============ */
        .slidebar-menu {
            background: linear-gradient(135deg, #0055CC, #003399);
            padding: 0.75rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }
        .slidebar-menu .nav-link {
            color: white !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            padding: 0.5rem 1rem;
            position: relative;
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        .slidebar-menu .nav-link:hover {
            color: var(--secondary) !important;
        }
        .slidebar-menu .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--secondary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .slidebar-menu .nav-link:hover::after {
            width: 80%;
        }
        .slidebar-menu .dropdown-toggle::after {
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            content: "\f078";
            border: none;
            margin-left: 0.35rem;
            font-size: 0.75rem;
        }
        .slidebar-menu .dropdown-menu {
            background-color: white;
            border: 1px solid var(--border);
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            margin-top: 0.5rem;
            min-width: 200px;
        }
        .slidebar-menu .dropdown-item {
            color: var(--text);
            padding: 0.6rem 1.2rem;
            font-size: 0.9rem;
        }
        .slidebar-menu .dropdown-item:hover {
            background-color: var(--light);
            color: var(--primary);
        }

        /* Active state */
        .slidebar-menu .nav-link.active {
            color: var(--secondary) !important;
        }
        .slidebar-menu .nav-link.active::after {
            width: 80%;
        }

        /* Responsive cho slidebar */
        @media (max-width: 992px) {
            .slidebar-menu .nav-link {
                font-size: 0.85rem;
                padding: 0.4rem 0.8rem;
            }
        }
        @media (max-width: 768px) {
            .slidebar-menu {
                padding: 0.5rem 0;
            }
            .slidebar-menu .container-fluid {
                padding: 0 1rem;
            }
            .slidebar-menu .nav {
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                padding-bottom: 0.5rem;
            }
            .slidebar-menu .nav-link {
                font-size: 0.8rem;
                padding: 0.35rem 0.7rem;
            }
        }

        /* ============ MAIN CONTENT ============ */
        main {
            min-height: calc(100vh - 300px);
            padding: 3rem 0;
        }

        /* ============ PRODUCT CARDS (giữ nguyên) ============ */
        /* ... (giữ nguyên toàn bộ phần product-card, footer, responsive) ... */
        .product-card { /* ... */ }
        /* ... */

        /* ============ FOOTER (giữ nguyên) ============ */
        footer { /* ... */ }

        /* ============ RESPONSIVE (giữ nguyên + bổ sung) ============ */
        @media (max-width: 768px) {
            .navbar-brand { font-size: 1.2rem; }
            .search-box { margin: 1rem 0; width: 100%; }
            .user-actions { margin-top: 1rem; flex-wrap: wrap; }
            main { padding: 1.5rem 0; }
            .product-card { margin-bottom: 1rem; }
        }
    </style>
</head>
<body>
    <!-- NAVBAR CHÍNH (giữ nguyên hoàn toàn) -->
    <nav class="navbar navbar-expand-lg navbar-main">
        <div class="container-fluid px-3 px-md-4">
            <a class="navbar-brand" href="{{ route('cua-hang.home') }}">
                <i class="fas fa-hard-hat"></i>
                <span>VLXD MINH HIẾU</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cua-hang.products.index') }}">
                            <i class="fas fa-box me-2"></i>Sản Phẩm
                        </a>
                    </li>
                </ul>
                <form action="{{ route('cua-hang.products.index') }}" class="d-flex w-100 w-lg-auto me-lg-3 mb-3 mb-lg-0">
                    <input name="timkiem" class="search-box flex-grow-1" type="search" placeholder="Tìm sản phẩm...">
                    <button type="submit" class="btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <div class="user-actions">
                    @if(session('user'))
                        <span class="user-text d-none d-lg-inline">{{ session('user')->TENDANGNHAP }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-auth btn-sm">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-auth btn-sm">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                        <a href="{{ route('register') }}" class="btn-auth btn-sm">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </a>
                    @endif
                    <a href="{{ route('cua-hang.cart.index') }}" class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="cart-badge">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- SLIDEBAR MENU MỚI (THÊM MỚI) -->
    <div class="slidebar-menu">
        <div class="container-fluid px-3 px-md-4">
            <ul class="nav justify-content-center gap-2 gap-lg-4">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('cua-hang.home') }}">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới Thiệu</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Bảo Giá
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Bảng giá xi măng</a></li>
                        <li><a class="dropdown-item" href="#">Bảng giá thép</a></li>
                        <li><a class="dropdown-item" href="#">Bảng giá gạch</a></li>
                        <li><a class="dropdown-item" href="#">Bảng giá cát đá</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dịch Vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin Tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cua-hang.products.index') }}">Sản Phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên Hệ</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="container-fluid px-3 px-md-4">
        @yield('content')
    </main>

    <!-- FOOTER (giữ nguyên) -->
    <footer>
        <div class="container-fluid px-3 px-md-4">
            <div class="row mb-4">
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="footer-logo">
                        <i class="fas fa-hard-hat"></i>
                        <span>VLXD MINH HIẾU</span>
                    </div>
                    <p class="text-muted small">Cung cấp vật liệu xây dựng chất lượng cao cho tất cả các dự án của bạn.</p>
                </div>
                <div class="col-md-3 footer-section">
                    <h5>Sản Phẩm</h5>
                    <ul>
                        <li><a href="{{ route('cua-hang.products.index') }}">Tất cả sản phẩm</a></li>
                        <li><a href="#">Giảm giá</a></li>
                        <li><a href="#">Mới nhất</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-section">
                    <h5>Trợ Giúp</h5>
                    <ul>
                        <li><a href="#">Liên hệ chúng tôi</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                        <li><a href="#">Điều khoản sử dụng</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-section">
                    <h5>Theo Dõi</h5>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm" style="background-color: var(--secondary); color: white;">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-sm" style="background-color: var(--secondary); color: white;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-sm" style="background-color: var(--secondary); color: white;">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 VLXD Minh Hiếu. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-main');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
