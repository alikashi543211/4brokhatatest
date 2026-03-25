<!DOCTYPE html>
<html lang="ur">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','4BroKhata')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .navbar { background: linear-gradient(135deg,#1a237e,#1565c0) !important; }
        .hero { background: linear-gradient(135deg,#1a237e 0%,#1565c0 100%); color:#fff; padding: 3rem 0; }
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,.07); }
        .stat-pill { background: linear-gradient(135deg,#fff,#f5f5f5); border-radius: 50px; padding: .8rem 1.5rem; border: 1px solid #e0e0e0; }
        footer { background: #1a237e; color: rgba(255,255,255,.7); }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-dark navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}"><i class="bi bi-journal-text me-2"></i>4BroKhata</a>
        <div class="ms-auto">
            <a href="{{ route('admin.login') }}" class="btn btn-outline-light btn-sm"><i class="bi bi-shield-lock me-1"></i>Admin</a>
        </div>
    </div>
</nav>
@yield('content')
<footer class="py-4 mt-5">
    <div class="container text-center">
        <p class="mb-0 small">4BroKhata — Family Expense Management System &copy; {{ date('Y') }}</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

