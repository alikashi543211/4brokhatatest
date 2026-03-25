@extends('admin.layouts.app')
@section('title','Edit User')
@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold">Edit User: {{ $user->employee_ad_id }}</h4>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back</a>
</div>
<div class="card" style="max-width:550px">
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Role * </label>
                <select name="user_type" class="form-select @error('user_type') is-invalid @enderror" required>
                    <option value="all" {{ $user->user_type === 'all' ? 'selected' : '' }}>Super Admin</option>
                    <option value="custom" {{ $user->user_type === 'custom' ? 'selected' : '' }}>Custom</option>
                </select>
                @error('user_type')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status * </label>
                <select name="is_active" class="form-select @error('is_active') is-invalid @enderror" required>
                    <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('is_active')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Theme Color</label>
                <input type="text" name="theme_color" class="form-control @error('theme_color') is-invalid @enderror" value="{{ old('theme_color', $user->theme_color) }}">
                @error('theme_color')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">New Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning px-4"><i class="bi bi-save me-2"></i>Update User</button>
        </form>
    </div>
</div>
@endsection

