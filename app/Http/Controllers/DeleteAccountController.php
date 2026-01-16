<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class DeleteAccountController extends Controller
{
    /**
     * Delete the user's account.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $user = Auth::guard('peserta_calon')->user();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User not authenticated.']);
        }

        // Verify password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'The provided password is incorrect.']);
        }

        // Logout before deletion
        Auth::guard('peserta_calon')->logout();

        // Wrap deletion in transaction
        DB::transaction(function () use ($user) {
            // Delete anggota first if user is ketua
            \App\Models\PesertaCalon::where('ketua_id', $user->id)->forceDelete();
            $user->forceDelete();
        });

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}