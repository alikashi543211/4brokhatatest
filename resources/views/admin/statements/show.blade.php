@extends('admin.layouts.app')
@section('title', $statement->title)
@section('content')
<div class="d-flex justify-content-between mb-3">
    <div>
        <h4 class="fw-bold mb-0">{{ $statement->title }}</h4>
        <small class="text-muted"><i class="bi bi-calendar me-1"></i>{{ $statement->statement_date?->format('d M Y') }}</small>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('statement.show', $statement) }}" class="btn btn-outline-secondary btn-sm" target="_blank"><i class="bi bi-eye me-1"></i>Public View</a>
        <a href="{{ route('admin.statements.edit', $statement) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil me-1"></i>Edit</a>
        <a href="{{ route('admin.statements.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i>Back</a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card text-white" style="background:linear-gradient(135deg,#1b5e20,#2e7d32)">
            <div class="card-body text-center">
                <h6 class="opacity-75">Total Amad</h6>
                <h3 class="fw-bold">₨ {{ number_format($statement->total_amad) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white" style="background:linear-gradient(135deg,#b71c1c,#c62828)">
            <div class="card-body text-center">
                <h6 class="opacity-75">Total Kharcha</h6>
                <h3 class="fw-bold">₨ {{ number_format($statement->total_kharcha) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white" style="background:{{ $statement->balance >= 0 ? 'linear-gradient(135deg,#e65100,#f57c00)' : 'linear-gradient(135deg,#4a148c,#6a1b9a)' }}">
            <div class="card-body text-center">
                <h6 class="opacity-75">Balance (Baqi)</h6>
                <h3 class="fw-bold">₨ {{ number_format($statement->balance) }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <span><i class="bi bi-arrow-up-circle me-2"></i>Kharcha (Expenses)</span>
                <button class="btn btn-sm btn-light text-danger" data-bs-toggle="modal" data-bs-target="#addKharchaModal">
                    <i class="bi bi-plus"></i> Add
                </button>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <thead class="table-warning"><tr><th>Sr#</th><th>Description</th><th class="text-end">Amount</th><th>Action</th></tr></thead>
                    <tbody>
                        @forelse($statement->kharcha as $t)
                        <tr class="{{ $t->color_tag === 'green' ? 'table-success' : '' }}">
                            <td>{{ $t->sr_no }}</td>
                            <td>{{ $t->description }}</td>
                            <td class="text-end fw-semibold">{{ number_format($t->amount, 2) }}</td>
                            <td class="text-nowrap">
                                <button type="button"
                                    class="btn btn-xs btn-outline-warning p-0 px-1 js-edit-txn"
                                    data-id="{{ $t->id }}"
                                    data-srno="{{ $t->sr_no }}"
                                    data-description="{{ $t->description }}"
                                    data-amount="{{ $t->amount }}"
                                    data-colortag="{{ $t->color_tag }}"
                                    data-transactiondate="{{ $t->transaction_date?->format('Y-m-d') }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('admin.transactions.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-xs btn-outline-danger p-0 px-1"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted py-3">No kharcha entries</td></tr>
                        @endforelse
                    </tbody>
                    <tfoot class="table-danger">
                        <tr><td colspan="2" class="fw-bold">TOTAL</td><td class="text-end fw-bold">{{ number_format($statement->total_kharcha, 2) }}</td><td></td></tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <span><i class="bi bi-arrow-down-circle me-2"></i>Amad (Income)</span>
                <button class="btn btn-sm btn-light text-success" data-bs-toggle="modal" data-bs-target="#addAmadModal">
                    <i class="bi bi-plus"></i> Add
                </button>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <thead class="table-warning"><tr><th>Sr#</th><th>Description</th><th class="text-end">Amount</th><th>Action</th></tr></thead>
                    <tbody>
                        @forelse($statement->amad as $t)
                        <tr>
                            <td>{{ $t->sr_no }}</td>
                            <td>{{ $t->description }}</td>
                            <td class="text-end fw-semibold text-success">{{ number_format($t->amount, 2) }}</td>
                            <td class="text-nowrap">
                                <button type="button"
                                    class="btn btn-xs btn-outline-warning p-0 px-1 js-edit-txn"
                                    data-id="{{ $t->id }}"
                                    data-srno="{{ $t->sr_no }}"
                                    data-description="{{ $t->description }}"
                                    data-amount="{{ $t->amount }}"
                                    data-colortag="{{ $t->color_tag }}"
                                    data-transactiondate="{{ $t->transaction_date?->format('Y-m-d') }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('admin.transactions.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-xs btn-outline-danger p-0 px-1"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-muted py-3">No amad entries</td></tr>
                        @endforelse
                    </tbody>
                    <tfoot class="table-success">
                        <tr><td colspan="2" class="fw-bold">TOTAL</td><td class="text-end fw-bold">{{ number_format($statement->total_amad, 2) }}</td><td></td></tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="alert {{ $statement->balance >= 0 ? 'alert-success' : 'alert-danger' }} mt-3 text-center fs-4 fw-bold">
    Baqi (Balance): ₨ {{ number_format($statement->balance, 2) }}
</div>

<div class="modal fade" id="addKharchaModal" tabindex="-1">
    <div class="modal-dialog"><div class="modal-content">
        <div class="modal-header bg-danger text-white"><h5 class="modal-title">Add Kharcha</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
        <form action="{{ route('admin.transactions.store', $statement) }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="kharcha">
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Sr No</label>
                    <input type="number" name="sr_no" class="form-control" value="{{ old('sr_no') }}">
                    @error('sr_no')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" required>
                    @error('description')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount (₨) *</label>
                    <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" step="0.01" value="{{ old('amount') }}" required>
                    @error('amount')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="transaction_date" class="form-control @error('transaction_date') is-invalid @enderror" value="{{ old('transaction_date') }}">
                    @error('transaction_date')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Highlight Color</label>
                    <select name="color_tag" class="form-select @error('color_tag') is-invalid @enderror">
                        <option value="">None</option>
                        <option value="green" {{ old('color_tag') === 'green' ? 'selected' : '' }}>Green</option>
                        <option value="yellow" {{ old('color_tag') === 'yellow' ? 'selected' : '' }}>Yellow</option>
                        <option value="red" {{ old('color_tag') === 'red' ? 'selected' : '' }}>Red</option>
                    </select>
                    @error('color_tag')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-danger">Add Kharcha</button></div>
        </form>
    </div></div>
</div>

<div class="modal fade" id="addAmadModal" tabindex="-1">
    <div class="modal-dialog"><div class="modal-content">
        <div class="modal-header bg-success text-white"><h5 class="modal-title">Add Amad</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
        <form action="{{ route('admin.transactions.store', $statement) }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="amad">
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Sr No</label>
                    <input type="number" name="sr_no" class="form-control" value="{{ old('sr_no') }}">
                    @error('sr_no')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" required>
                    @error('description')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount (₨) *</label>
                    <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" step="0.01" value="{{ old('amount') }}" required>
                    @error('amount')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="transaction_date" class="form-control @error('transaction_date') is-invalid @enderror" value="{{ old('transaction_date') }}">
                    @error('transaction_date')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-success">Add Amad</button></div>
        </form>
    </div></div>
</div>

<div class="modal fade" id="editTxnModal" tabindex="-1">
    <div class="modal-dialog"><div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Edit Transaction</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <form id="editTxnForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Sr No</label>
                    <input type="number" name="sr_no" id="edit_sr_no" class="form-control" value="{{ old('sr_no') }}">
                    @error('sr_no')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <input type="text" name="description" id="edit_description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" required>
                    @error('description')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount (₨) *</label>
                    <input type="number" name="amount" id="edit_amount" class="form-control @error('amount') is-invalid @enderror" step="0.01" value="{{ old('amount') }}" required>
                    @error('amount')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Color Tag</label>
                    <select name="color_tag" id="edit_color_tag" class="form-select @error('color_tag') is-invalid @enderror">
                        <option value="">None</option>
                        <option value="green" {{ old('color_tag') === 'green' ? 'selected' : '' }}>Green</option>
                        <option value="yellow" {{ old('color_tag') === 'yellow' ? 'selected' : '' }}>Yellow</option>
                        <option value="red" {{ old('color_tag') === 'red' ? 'selected' : '' }}>Red</option>
                    </select>
                    @error('color_tag')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="transaction_date" id="edit_transaction_date" class="form-control @error('transaction_date') is-invalid @enderror" value="{{ old('transaction_date') }}">
                    @error('transaction_date')
                    <div class="invalid-feedback" style="display:block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-primary">Update</button></div>
        </form>
    </div></div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var modalEl = document.getElementById('editTxnModal');
    if (!modalEl) return;
    var modal = new bootstrap.Modal(modalEl);
    var shouldOpen = @json($errors->has('description') || $errors->has('amount') || $errors->has('sr_no') || $errors->has('color_tag') || $errors->has('transaction_date'));
    if (shouldOpen) {
        modal.show();
    }
    document.querySelectorAll('.js-edit-txn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var id = btn.getAttribute('data-id');
            document.getElementById('editTxnForm').action = '/admin/transactions/' + id;
            document.getElementById('edit_sr_no').value = btn.getAttribute('data-srno') || '';
            document.getElementById('edit_description').value = btn.getAttribute('data-description') || '';
            document.getElementById('edit_amount').value = btn.getAttribute('data-amount') || '';
            document.getElementById('edit_color_tag').value = btn.getAttribute('data-colortag') || '';
            document.getElementById('edit_transaction_date').value = btn.getAttribute('data-transactiondate') || '';
            modal.show();
        });
    });
});
</script>
@endpush

