<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use App\Models\Barcode;
use App\Mail\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            'email' => 'required|email|unique:users',
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

        Mail::to($user)->send(new Registered());

        // $to = $user->email;
        // $subject = "MFTC Training Registration";

        // $message = "You have registered successfully. You can now create your CV.";

        // // Always set content-type when sending HTML email
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // // More headers
        // $headers .= 'From: <info@mftctraining.com>' . "\r\n";

        // mail($to, $subject, $message, $headers);

        return redirect()->route('user.barcode');
    }
}
