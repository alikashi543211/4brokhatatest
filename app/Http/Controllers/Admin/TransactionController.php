<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statement;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function store(Request $request, Statement $statement)
    {
        try {
            $validated = $request->validate([
                'type' => ['required', 'in:kharcha,amad'],
                'description' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^(?=.*[A-Za-z])[A-Za-z0-9][A-Za-z0-9 .,+()-]*$/',
                    'not_regex:/<\s*script\b/i',
                    'not_regex:/<\?|\?>/',
                ],
                'amount' => [
                    'required',
                    'numeric',
                    'min:0',
                    'regex:/^\\d+(\\.\\d{1,2})?$/',
                ],
                'sr_no' => ['nullable', 'integer', 'min:0'],
                'color_tag' => ['nullable', 'string', 'max:50', 'in:green,yellow,red'],
                'transaction_date' => ['nullable', 'date'],
                'notes' => [
                    'nullable',
                    'string',
                    'max:2000',
                    'not_regex:/<\s*script\b/i',
                    'not_regex:/<\?|\?>/',
                ],
            ]);

            $validated['statement_id'] = $statement->id;
            $validated['created_by'] = Auth::guard('admin')->id();

            Transaction::create($validated);

            return redirect()
                ->route('admin.statements.show', $statement)
                ->with('success', ucfirst($validated['type']).' added!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to add transaction.')->withInput();
        }
    }

    public function update(Request $request, Transaction $transaction)
    {
        try {
            $validated = $request->validate([
                'description' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^(?=.*[A-Za-z])[A-Za-z0-9][A-Za-z0-9 .,+()-]*$/',
                    'not_regex:/<\s*script\b/i',
                    'not_regex:/<\?|\?>/',
                ],
                'amount' => [
                    'required',
                    'numeric',
                    'min:0',
                    'regex:/^\\d+(\\.\\d{1,2})?$/',
                ],
                'sr_no' => ['nullable', 'integer', 'min:0'],
                'color_tag' => ['nullable', 'string', 'max:50', 'in:green,yellow,red'],
                'transaction_date' => ['nullable', 'date'],
                'notes' => [
                    'nullable',
                    'string',
                    'max:2000',
                    'not_regex:/<\s*script\b/i',
                    'not_regex:/<\?|\?>/',
                ],
            ]);

            $transaction->update($validated);

            return redirect()
                ->route('admin.statements.show', $transaction->statement_id)
                ->with('success', 'Transaction updated!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to update transaction.')->withInput();
        }
    }

    public function destroy(Transaction $transaction)
    {
        try {
            $statementId = $transaction->statement_id;
            $transaction->delete();

            return redirect()
                ->route('admin.statements.show', $statementId)
                ->with('success', 'Transaction deleted!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to delete transaction.');
        }
    }
}

