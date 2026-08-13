<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', Rule::in(['admin', 'editor', 'user'])],
        ]);

        if ($validated['role'] === 'admin' && auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang dapat membuat pengguna dengan peran admin.');
        }

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        Log::info('User created', ['email' => $user->email, 'role' => $user->role, 'by' => auth()->user()->name]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $superadminEmail = config('auth.superadmin_email', 'superadmin@msp.com');
        $isSuperadmin = $user->email === $superadminEmail;
        $isSelf = $user->id === auth()->id();

        // Superadmin: hanya bisa update password diri sendiri
        if ($isSuperadmin && !$isSelf) {
            abort(403, 'Akun superadmin hanya dapat diubah oleh superadmin sendiri.');
        }

        $rules = [
            'password' => 'nullable|string|min:8|confirmed',
        ];

        if (!$isSuperadmin) {
            $rules['name'] = 'required|string|max:255';
            $rules['email'] = 'required|email|max:255|unique:users,email,' . $user->id;
            $rules['role'] = ['required', Rule::in(['admin', 'editor', 'user'])];
        }

        $validated = $request->validate($rules);

        if ($validated['password'] ?? null) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        if (!$isSuperadmin) {
            if ($validated['role'] === 'admin' && auth()->user()->role !== 'admin') {
                abort(403, 'Hanya admin yang dapat menetapkan peran admin.');
            }
        }

        $user->update($validated);

        Log::info('User updated', ['id' => $user->id, 'email' => $user->email, 'by' => auth()->user()->name]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->email === config('auth.superadmin_email', 'superadmin@msp.com')) {
            return redirect()->route('admin.users.index')->with('error', 'Akun superadmin tidak dapat dihapus.');
        }

        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }

        Log::info('User deleted', ['id' => $user->id, 'email' => $user->email, 'by' => auth()->user()->name]);

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
