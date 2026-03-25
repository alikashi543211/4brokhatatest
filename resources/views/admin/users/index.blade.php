@extends('admin.layouts.app')
@section('title','Admin Users')
@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold">Admin Users</h4>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Add User</a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="usersTable">
            <thead class="table-dark"><tr><th>#</th><th>Employee ID</th><th>Type</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($admins as $i => $admin)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td><code>{{ $admin->employee_ad_id }}</code></td>
                    <td><span class="badge bg-{{ $admin->user_type === 'all' ? 'danger' : 'primary' }}">{{ $admin->user_type === 'all' ? 'Super Admin' : 'Custom' }}</span></td>
                    <td><span class="badge bg-{{ $admin->is_active ? 'success' : 'secondary' }}">{{ $admin->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.users.edit', $admin) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                        @if($admin->user_type !== 'all')
                        <form action="{{ route('admin.users.destroy', $admin) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove user?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $admins->links() }}
    </div>
</div>
@endsection
@push('scripts')
<script>$('#usersTable').DataTable();</script>
@endpush

