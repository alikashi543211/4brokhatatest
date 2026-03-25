<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '4BroKhata Admin')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        :root { --sidebar-width: 260px; }
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .sidebar {
            width: var(--sidebar-width); background: linear-gradient(180deg, #1a237e 0%, #283593 100%);
            min-height: 100vh; position: fixed; top: 0; left: 0; z-index: 1000;
            transition: transform .3s; overflow-y: auto;
        }
        .sidebar .brand { padding: 1.5rem 1.2rem; border-bottom: 1px solid rgba(255,255,255,.1); }
        .sidebar .brand h5 { color: #fff; margin: 0; font-weight: 700; font-size: 1.2rem; }
        .sidebar .brand small { color: rgba(255,255,255,.6); font-size: .75rem; }
        .sidebar .nav-link { color: rgba(255,255,255,.75); padding: .65rem 1.2rem; border-radius: 8px; margin: 2px 8px; font-size: .9rem; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,.15); color: #fff; }
        .sidebar .nav-link i { width: 22px; }
        .sidebar .nav-section { color: rgba(255,255,255,.4); font-size: .7rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; padding: .8rem 1.2rem .3rem; }
        .main-content { margin-left: var(--sidebar-width); padding: 0; }
        .topbar { background: #fff; padding: .8rem 1.5rem; border-bottom: 1px solid #e0e0e0; display: flex; align-items: center; justify-content: space-between; }
        .content-area { padding: 1.5rem; }
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,.06); }
        .card-header { border-radius: 12px 12px 0 0 !important; font-weight: 600; }
        .stat-card { border-radius: 12px; padding: 1.5rem; color: #fff; }
        .badge-green { background: #28a745 !important; }
        .table-green-row { background-color: #d4edda !important; }
        @media(max-width:768px){
            .sidebar{transform:translateX(-100%);} .sidebar.show{transform:none;}
            .main-content{margin-left:0;}
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="sidebar" id="sidebar">
    <div class="brand">
        <h5><i class="bi bi-journal-text me-2"></i>4BroKhata</h5>
        <small>Khata Management System</small>
    </div>
    <nav class="py-2">
        <div class="nav-section">Main</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <div class="nav-section">Khata</div>
        <a href="{{ route('admin.statements.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.statements.*') ? 'active' : '' }}">
            <i class="bi bi-journal-bookmark"></i> Statements
        </a>
        <a href="{{ route('admin.statements.create') }}" class="nav-link d-flex align-items-center gap-2">
            <i class="bi bi-plus-circle"></i> New Statement
        </a>
        @if(auth('admin')->user()?->isSuperAdmin())
        <div class="nav-section">System</div>
        <a href="{{ route('admin.users.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Admin Users
        </a>
        @endif
        <div class="nav-section">View</div>
        <a href="{{ route('home') }}" class="nav-link d-flex align-items-center gap-2" target="_blank">
            <i class="bi bi-eye"></i> Public Frontend
        </a>
    </nav>
</div>

<div class="main-content">
    <div class="topbar">
        <button class="btn btn-sm btn-outline-secondary d-md-none" onclick="document.getElementById('sidebar').classList.toggle('show')">
            <i class="bi bi-list"></i>
        </button>
        <div></div>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted small">{{ auth('admin')->user()?->name ?? auth('admin')->user()?->employee_ad_id }}</span>
            <span class="badge bg-primary">{{ ucfirst(str_replace('_',' ', auth('admin')->user()?->user_type ?? '')) }}</span>
            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                @csrf
                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
        </div>
    </div>
    <div class="content-area">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show"><i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
@stack('scripts')
</body>
</html>

