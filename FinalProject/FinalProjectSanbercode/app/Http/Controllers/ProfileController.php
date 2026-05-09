<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function tampil()
    {
        $user = auth()->user();
        $profile = $user->profile;
        return view('profil.tampil', compact('user', 'profile'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string',
            'age' => 'nullable|integer|min:0',
            'address' => 'nullable|string',
        ]);

        $user = auth()->user();
        
        Profile::updateOrCreate(
            ['user_id' => $user->id],
            $request->only('bio', 'age', 'address')
        );

        return redirect()->route('profil.tampil')->with('success', 'Profil berhasil diperbarui.');
    }
}
