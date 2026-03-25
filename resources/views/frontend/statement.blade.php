@extends('frontend.layouts.app')
@section('title', $statement->title)
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">{{ $statement->title }}</h4>
            <small class="text-muted"><i class="bi bi-calendar me-1"></i>{{ $statement->statement_date?->format('d M Y') }}</small>
        </div>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back</a>
    </div>

    <div class="card mb-4" style="border: 3px solid #4472c4">
        <div class="card-header text-center fw-bold text-white" style="background:#4472c4; font-size:1.1rem; text-transform:uppercase; letter-spacing:1px">
            {{ strtoupper($statement->title) }}
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" style="background:#fff">
                    <thead>
                        <tr style="background:#ffd700; color:#000">
                            <th style="width:60px">SR NO</th>
                            <th>KHARCHA (EXPANSE)</th>
                            <th style="width:120px">AMOUNT</th>
                            <th></th>
                            <th>AMAD</th>
                            <th style="width:120px">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $kharchaList = $statement->kharcha->values();
                            $amadList = $statement->amad->values();
                            $maxRows = max($kharchaList->count(), $amadList->count());
                        @endphp
                        @for($i = 0; $i < $maxRows; $i++)
                        @php
                            $k = $kharchaList->get($i);
                            $a = $amadList->get($i);
                        @endphp
                        <tr>
                            <td class="text-center fw-bold {{ $k?->color_tag === 'green' ? 'table-success' : '' }}">{{ $k?->sr_no }}</td>
                            <td class="{{ $k?->color_tag === 'green' ? 'table-success' : '' }}">{{ $k?->description }}</td>
                            <td class="text-end {{ $k?->color_tag === 'green' ? 'table-success' : '' }}">{{ $k ? number_format($k->amount, 2) : '' }}</td>
                            <td style="background:#e0e0e0; width:8px"></td>
                            <td>{{ $a?->description }}</td>
                            <td class="text-end text-success fw-semibold">{{ $a ? number_format($a->amount, 2) : '' }}</td>
                        </tr>
                        @endfor
                        <tr style="background:#ffd700; font-weight:bold">
                            <td colspan="2" class="text-end">TOTAL</td>
                            <td class="text-end">{{ number_format($statement->total_kharcha, 2) }}</td>
                            <td></td>
                            <td class="fw-bold">TOTAL</td>
                            <td class="text-end">{{ number_format($statement->total_amad, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center" style="background:#ffd700">
            <span class="fs-3 fw-bold text-dark">{{ number_format($statement->balance, 2) }}</span>
            <div class="small text-muted">(Balance / Baqi)</div>
        </div>
    </div>

    @if($statement->notes)
    <div class="alert alert-info"><i class="bi bi-info-circle me-2"></i>{{ $statement->notes }}</div>
    @endif
</div>
@endsection

