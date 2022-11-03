<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function details($code){
        $user = Barcode::where('number', $code)->first()->user ?? false;
        if($user){
            return view('details', ['user' => $user]);
        }else{
            return redirect('/');
        }
    }
}
