<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatementController extends Controller
{
    public function index()
    {
        $statements = Statement::with([
            'kharcha' => fn ($q) => $q->where('is_active', 1)->orderBy('sr_no'),
            'amad' => fn ($q) => $q->where('is_active', 1)->orderBy('sr_no'),
        ])
            ->where('is_active', 1)
            ->orderByDesc('id')
            ->paginate(15);

        return view('admin.statements.index', compact('statements'));
    }

    public function create()
    {
        return view('admin.statements.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => [
                    'required',
                    'string',
                    'max:200',
                    'regex:/^(?=.*[A-Za-z])[A-Za-z0-9][A-Za-z0-9 .,+()-]*$/',
                    'not_regex:/<\s*script\b/i',
                    'not_regex:/<\?|\?>/',
                ],
                'statement_date' => ['required', 'date'],
                'notes' => [
                    'nullable',
                    'string',
                    'max:2000',
                    'not_regex:/<\s*script\b/i',
                    'not_regex:/<\?|\?>/',
                ],
            ]);

            $validated['created_by'] = Auth::guard('admin')->id();

            $stmt = Statement::create($validated);

            return redirect()
                ->route('admin.statements.show', $stmt)
                ->with('success', 'Statement created successfully!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to create statement.')->withInput();
        }
    }

    public function show(Statement $statement)
    {
        $statement->load([
            'kharcha' => fn ($q) => $q->where('is_active', 1)->orderBy('sr_no'),
            'amad' => fn ($q) => $q->where('is_active', 1)->orderBy('sr_no'),
        ]);

        return view('admin.statements.show', compact('statement'));
    }

    public function edit(Statement $statement)
    {
        return view('admin.statements.edit', compact('statement'));
    }

    public function update(Request $request, Statement $statement)
    {
        try {
            $validated = $request->validate([
                'title' => [
                    'required',
                    'string',
                    'max:200',
                    'regex:/^(?=.*[A-Za-z])[A-Za-z0-9][A-Za-z0-9 .,+()-]*$/',
                    'not_regex:/<\s*script\b/i',
                    'not_regex:/<\?|\?>/',
                ],
                'statement_date' => ['required', 'date'],
                'notes' => [
                    'nullable',
                    'string',
                    'max:2000',
                    'not_regex:/<\s*script\b/i',
                    'not_regex:/<\?|\?>/',
                ],
            ]);

            $statement->update($validated);

            return redirect()
                ->route('admin.statements.show', $statement)
                ->with('success', 'Statement updated!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to update statement.')->withInput();
        }
    }

    public function destroy(Statement $statement)
    {
        try {
            $statement->update(['is_active' => 0]);

            return redirect()
                ->route('admin.statements.index')
                ->with('success', 'Statement deleted!');
        } catch (\Throwable $e) {
            return redirect()
                ->route('admin.statements.index')
                ->with('error', 'Failed to delete statement.');
        }
    }
}

