@extends('admin.layouts.app')
@section('title', 'Dashboard — 4BroKhata')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div><h4 class="mb-0 fw-bold">Dashboard</h4><small class="text-muted">Overview of all transactions</small></div>
    <a href="{{ route('admin.statements.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>New Statement</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card" style="background:linear-gradient(135deg,#1a237e,#283593)">
            <div class="d-flex justify-content-between align-items-start">
                <div><p class="mb-1 opacity-75 small">Total Statements</p><h3 class="mb-0 fw-bold">{{ $totalStatements }}</h3></div>
                <i class="bi bi-journal-bookmark fs-2 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background:linear-gradient(135deg,#1b5e20,#2e7d32)">
            <div class="d-flex justify-content-between align-items-start">
                <div><p class="mb-1 opacity-75 small">Total Amad (Income)</p><h3 class="mb-0 fw-bold">₨ {{ number_format($totalAmad) }}</h3></div>
                <i class="bi bi-arrow-down-circle fs-2 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background:linear-gradient(135deg,#b71c1c,#c62828)">
            <div class="d-flex justify-content-between align-items-start">
                <div><p class="mb-1 opacity-75 small">Total Kharcha (Expense)</p><h3 class="mb-0 fw-bold">₨ {{ number_format($totalKharcha) }}</h3></div>
                <i class="bi bi-arrow-up-circle fs-2 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background:{{ $totalBalance >= 0 ? 'linear-gradient(135deg,#e65100,#f57c00)' : 'linear-gradient(135deg,#4a148c,#6a1b9a)' }}">
            <div class="d-flex justify-content-between align-items-start">
                <div><p class="mb-1 opacity-75 small">Balance</p><h3 class="mb-0 fw-bold">₨ {{ number_format($totalBalance) }}</h3></div>
                <i class="bi bi-wallet2 fs-2 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white py-3"><h6 class="mb-0 fw-bold">Monthly Amad vs Kharcha</h6></div>
            <div class="card-body"><canvas id="monthlyChart" height="100"></canvas></div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-white py-3"><h6 class="mb-0 fw-bold">Recent Statements</h6></div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @forelse($recentStatements as $stmt)
                    <li class="list-group-item px-3 py-2">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 small fw-semibold">{{ \Illuminate\Support\Str::limit($stmt->title, 30) }}</p>
                                <small class="text-muted">{{ $stmt->statement_date?->format('d M Y') }}</small>
                            </div>
                            <span class="badge {{ $stmt->balance >= 0 ? 'bg-success' : 'bg-danger' }} align-self-center">
                                ₨ {{ number_format($stmt->balance) }}
                            </span>
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item text-muted small text-center py-4">No statements yet</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
const labels = @json(collect($chartData).pluck('label'));
const amad = @json(collect($chartData).pluck('amad'));
const khar = @json(collect($chartData).pluck('khar'));
new Chart(document.getElementById('monthlyChart'), {
    type: 'bar',
    data: {
        labels,
        datasets: [
            { label: 'Amad (Income)', data: amad, backgroundColor: 'rgba(46,125,50,.8)', borderRadius: 6 },
            { label: 'Kharcha (Expense)', data: khar, backgroundColor: 'rgba(198,40,40,.8)', borderRadius: 6 },
        ]
    },
    options: { responsive: true, plugins: { legend: { position: 'top' } }, scales: { y: { beginAtZero: true } } }
});
</script>
@endpush

