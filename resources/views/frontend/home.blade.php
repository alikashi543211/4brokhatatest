@extends('frontend.layouts.app')
@section('title','4BroKhata — Home')
@section('content')
<div class="hero">
    <div class="container text-center">
        <h1 class="display-5 fw-bold mb-3"><i class="bi bi-journal-text me-3"></i>4BroKhata</h1>
        <p class="lead opacity-75 mb-4">Family Income & Expense Tracker</p>
        <div class="row justify-content-center g-3">
            <div class="col-auto">
                <div class="stat-pill text-dark text-center">
                    <div class="small text-muted">Total Amad</div>
                    <div class="fw-bold text-success fs-5">₨ {{ number_format($totalAmad, 2) }}</div>
                </div>
            </div>
            <div class="col-auto">
                <div class="stat-pill text-dark text-center">
                    <div class="small text-muted">Total Kharcha</div>
                    <div class="fw-bold text-danger fs-5">₨ {{ number_format($totalKharcha, 2) }}</div>
                </div>
            </div>
            <div class="col-auto">
                <div class="stat-pill text-dark text-center">
                    <div class="small text-muted">Balance</div>
                    <div class="fw-bold {{ $balance >= 0 ? 'text-success' : 'text-danger' }} fs-5">₨ {{ number_format($balance, 2) }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <h5 class="fw-bold mb-4"><i class="bi bi-journal-bookmark me-2 text-primary"></i>All Statements</h5>
    <div class="row g-3">
        @forelse($statements as $stmt)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-title fw-bold">{{ $stmt->title }}</h6>
                    <p class="text-muted small mb-3"><i class="bi bi-calendar me-1"></i>{{ $stmt->statement_date?->format('d M Y') }}</p>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="small text-success"><i class="bi bi-arrow-down-circle me-1"></i>Amad</span>
                        <span class="fw-semibold text-success">₨ {{ number_format($stmt->total_amad, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="small text-danger"><i class="bi bi-arrow-up-circle me-1"></i>Kharcha</span>
                        <span class="fw-semibold text-danger">₨ {{ number_format($stmt->total_kharcha, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge {{ $stmt->balance >= 0 ? 'bg-success' : 'bg-danger' }} fs-6 px-3 py-2">
                            Balance: ₨ {{ number_format($stmt->balance, 2) }}
                        </span>
                        <a href="{{ route('statement.show', $stmt) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye me-1"></i>View
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">
            <i class="bi bi-journal-x fs-1"></i>
            <p class="mt-2">No statements found.</p>
        </div>
        @endforelse
    </div>
    <div class="mt-4">{{ $statements->links() }}</div>
</div>
@endsection

