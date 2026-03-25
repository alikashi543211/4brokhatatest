@extends('admin.layouts.app')
@section('title','New Statement')
@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold">Create New Statement</h4>
    <a href="{{ route('admin.statements.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back</a>
</div>
<div class="card" style="max-width:600px">
    <div class="card-body">
        <form action="{{ route('admin.statements.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Statement Title * </label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="e.g. Statement Until Date 23-3-2026" required>
                @error('title')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Date * </label>
                <input type="date" name="statement_date" class="form-control @error('statement_date') is-invalid @enderror" value="{{ old('statement_date', date('Y-m-d')) }}" required>
                @error('statement_date')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Notes</label>
                <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" rows="3" placeholder="Optional notes...">{{ old('notes') }}</textarea>
                @error('notes')
                <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg me-2"></i>Create Statement</button>
        </form>
    </div>
</div>
@endsection

