<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
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

    public function jobs($code){
        // $company = Barcode::where('number', $code)->first()->user->company()->with('jobs')->get() ?? false;
        $company = Barcode::where('number', $code)->first()->user->company()->first() ?? false;
        return view('jobs', ['company'=> $company]);
        // return view('jobs');
        
    }

    public function ticketDetails($code) {
        $ticket = Ticket::where('qrcode_number', $code)->first();
        return view('ticket-detail', compact('ticket'));
    }

}
