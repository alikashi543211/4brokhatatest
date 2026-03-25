<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $admins = Admin::where('is_deleted', 0)
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.users.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'employee_ad_id' => [
                    'required',
                    'string',
                    'max:100',
                    'unique:tbl_admin,employee_ad_id',
                    'regex:/^(?=.*[A-Za-z])[A-Za-z0-9_-]+$/',
                    'not_regex:/<\s*script\b/i',
                    'not_regex:/<\?|\?>/',
                ],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'user_type' => ['required', 'in:all,custom'],
            ]);

            $validated['password'] = Hash::make($validated['password']);
            $validated['is_active'] = 1;

            $validated['theme_color'] = $request->input('theme_color');

            Admin::create($validated);

            return redirect()
                ->route('admin.users.index')
                ->with('success', 'User created!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to create user.')->withInput();
        }
    }

    public function edit(Admin $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, Admin $user)
    {
        try {
            $baseValidated = $request->validate([
                'user_type' => ['required', 'in:all,custom'],
                'is_active' => ['required', 'in:0,1'],
                'theme_color' => ['nullable', 'string', 'max:50', 'not_regex:/<\s*script\b/i', 'not_regex:/<\?|\?>/'],
            ]);

            if ($request->filled('password')) {
                $pwdValidated = $request->validate([
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
                ]);

                $baseValidated['password'] = Hash::make($pwdValidated['password']);
            }

            if ($request->has('theme_color')) {
                $baseValidated['theme_color'] = $request->input('theme_color');
            }

            $user->update($baseValidated);

            return redirect()
                ->route('admin.users.index')
                ->with('success', 'User updated!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to update user.')->withInput();
        }
    }

    public function destroy(Admin $user)
    {
        try {
            if ($user->user_type === 'all') {
                return back()->with('error', 'Cannot delete Super Admin!');
            }

            $user->update(['is_deleted' => 1, 'is_active' => 0]);

            return redirect()
                ->route('admin.users.index')
                ->with('success', 'User removed!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to remove user.');
        }
    }
}

