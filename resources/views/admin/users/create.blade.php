@extends('admin.layouts.app')
@section('title','Add User')
@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold">Add New Admin User</h4>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back</a>
</div>
<div class="card" style="max-width:550px">
    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Username * </label>
                <input type="text" name="employee_ad_id" class="form-control @error('employee_ad_id') is-invalid @enderror" value="{{ old('employee_ad_id') }}" required>
                @error('employee_ad_id')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Role * </label>
                <select name="user_type" class="form-select @error('user_type') is-invalid @enderror" required>
                    <option value="all" {{ old('user_type') === 'all' ? 'selected' : '' }}>Super Admin</option>
                    <option value="custom" {{ old('user_type') === 'custom' ? 'selected' : '' }}>Custom</option>
                </select>
                @error('user_type')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Theme Color</label>
                <input type="text" name="theme_color" class="form-control @error('theme_color') is-invalid @enderror" value="{{ old('theme_color') }}">
                @error('theme_color')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Password * </label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Confirm Password * </label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-person-plus me-2"></i>Create User</button>
        </form>
    </div>
</div>
@endsection

