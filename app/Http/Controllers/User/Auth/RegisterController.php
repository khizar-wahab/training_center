<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use App\Models\Barcode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Barcode::create([
            'number' => '0'.time(),
            'type' => 0,
            'user_id' => $user->id
        ]);

        Auth::login($user);
        return redirect()->route('user.dashboard');
    }
}
