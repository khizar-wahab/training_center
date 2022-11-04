<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function update_profile(Request $request)
    {
        if($request->name != ""){
            if($request->email != ""){
                $admin = Admin::find(Auth::guard('admin')->user()->id);
                if($admin){
                    $admin->update([
                        'name' => $request->name,
                        'email' => $request->email,
                    ]);

                    return redirect()->back()->with(session()->flash('alert', 'Profile updated.'));
                }
            }else{
                return redirect()->back()->with(session()->flash('error', 'Please fill all the fields.'));
            }
        }else{
            return redirect()->back()->with(session()->flash('error', 'Please fill all the fields.'));
        }
    }

    public function change_password(Request $request)
    {
        if($request->password != ""){
            if($request->nPassword != ""){
                if($request->cPassword != ""){
                    if($request->password == session('admin_password')){
                        if($request->nPassword == $request->cPassword){
                            $admin = Admin::find(Auth::guard('admin')->user()->id);
                            if($admin){
                                $admin->update([
                                    'password' => Hash::make($request->nPassword),
                                ]);
            
                                return redirect()->back()->with(session()->flash('alert', 'Password changed.'));
                            }
                        }else{
                            return redirect()->back()->with(session()->flash('error', 'Password confirmation does not match.'));
                        }
                    }else{
                        return redirect()->back()->with(session()->flash('error', 'Invalid current password'));
                    }
                }else{
                    return redirect()->back()->with(session()->flash('error', 'Please fill all the fields.'));
                }
            }else{
                return redirect()->back()->with(session()->flash('error', 'Please fill all the fields.'));
            }
        }else{
            return redirect()->back()->with(session()->flash('error', 'Please fill all the fields.'));
        }
    }
}