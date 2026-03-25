@extends('admin.layouts.app')
@section('title','Statements')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div><h4 class="mb-0 fw-bold">All Statements</h4></div>
    <a href="{{ route('admin.statements.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>New Statement</a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="stmtTable">
            <thead class="table-dark">
                <tr><th>#</th><th>Title</th><th>Date</th><th>Amad</th><th>Kharcha</th><th>Balance</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($statements as $i => $stmt)
                <tr>
                    <td>{{ $statements->firstItem() + $i }}</td>
                    <td>{{ $stmt->title }}</td>
                    <td>{{ $stmt->statement_date?->format('d M Y') }}</td>
                    <td class="text-success fw-semibold">₨ {{ number_format($stmt->total_amad) }}</td>
                    <td class="text-danger fw-semibold">₨ {{ number_format($stmt->total_kharcha) }}</td>
                    <td><span class="badge {{ $stmt->balance >= 0 ? 'bg-success' : 'bg-danger' }} fs-6">₨ {{ number_format($stmt->balance) }}</span></td>
                    <td>
                        <a href="{{ route('admin.statements.show', $stmt) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('admin.statements.edit', $stmt) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.statements.destroy', $stmt) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this statement?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $statements->links() }}
    </div>
</div>
@endsection
@push('scripts')
<script>$('#stmtTable').DataTable({paging:false,searching:true,info:false});</script>
@endpush

