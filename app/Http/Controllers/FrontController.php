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
        $qrcode = Barcode::where('number', $code)->first() ?? false;
        $user = $qrcode ? $qrcode->user : false;
        $company= $user ? $user->company : false;
        $jobs = $company->jobs ?? collect([]);
        if($company){
            return view('jobs', ['company'=> $company, 'jobs' => $jobs]);
        }
        return $code;
        //return redirect('/');
    }

    public function ticketDetails($code) {
        $ticket = Ticket::where('qrcode_number', $code)->first();
        return view('ticket-detail', compact('ticket'));
    }

    //show job application form
    public function apply(Job $job)
    {
        return view('company.job.application', ['job'=> $job]);
    }

}
