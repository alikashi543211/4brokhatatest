<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statement;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStatements = Statement::where('is_active', 1)->count();

        $totalAmad = Transaction::where('type', 'amad')
            ->where('is_active', 1)
            ->sum('amount');

        $totalKharcha = Transaction::where('type', 'kharcha')
            ->where('is_active', 1)
            ->sum('amount');

        $totalBalance = (float) $totalAmad - (float) $totalKharcha;

        $recentStatements = Statement::with([
            'kharcha' => fn ($q) => $q->orderBy('sr_no'),
            'amad' => fn ($q) => $q->orderBy('sr_no'),
        ])
            ->where('is_active', 1)
            ->orderByDesc('id')
            ->take(5)
            ->get();

        $start = now()->subMonths(5)->startOfMonth();
        $end = now()->endOfMonth();

        $tx = Transaction::where('is_active', 1)
            ->whereNotNull('transaction_date')
            ->whereBetween('transaction_date', [$start, $end])
            ->get(['type', 'amount', 'transaction_date']);

        $months = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $key = $month->format('Y-m');
            $months[$key] = [
                'label' => $month->format('M Y'),
                'amad' => 0.0,
                'khar' => 0.0,
            ];
        }

        foreach ($tx as $t) {
            $key = $t->transaction_date?->format('Y-m');
            if (!$key || !isset($months[$key])) {
                continue;
            }

            if ($t->type === 'amad') {
                $months[$key]['amad'] = (float) $months[$key]['amad'] + (float) $t->amount;
            } elseif ($t->type === 'kharcha') {
                $months[$key]['khar'] = (float) $months[$key]['khar'] + (float) $t->amount;
            }
        }

        $chartData = array_values($months);

        return view('admin.dashboard', [
            'totalStatements' => $totalStatements,
            'totalAmad' => $totalAmad,
            'totalKharcha' => $totalKharcha,
            'totalBalance' => $totalBalance,
            'recentStatements' => $recentStatements,
            'chartData' => $chartData,
        ]);
    }
}

