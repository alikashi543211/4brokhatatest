<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Statement;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index()
    {
        $totalAmad = Transaction::where('type', 'amad')
            ->where('is_active', 1)
            ->sum('amount');

        $totalKharcha = Transaction::where('type', 'kharcha')
            ->where('is_active', 1)
            ->sum('amount');

        $balance = (float) $totalAmad - (float) $totalKharcha;

        $statements = Statement::with([
            'kharcha' => fn ($q) => $q->where('is_active', 1)->orderBy('sr_no'),
            'amad' => fn ($q) => $q->where('is_active', 1)->orderBy('sr_no'),
        ])
            ->where('is_active', 1)
            ->orderByDesc('id')
            ->paginate(10);

        return view('frontend.home', compact('totalAmad', 'totalKharcha', 'balance', 'statements'));
    }

    public function show(Statement $statement)
    {
        $statement->load([
            'kharcha' => fn ($q) => $q->where('is_active', 1)->orderBy('sr_no'),
            'amad' => fn ($q) => $q->where('is_active', 1)->orderBy('sr_no'),
        ]);

        return view('frontend.statement', compact('statement'));
    }
}

