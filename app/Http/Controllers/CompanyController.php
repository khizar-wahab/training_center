<?php

namespace App\Http\Controllers;

use App\Mail\Registered;
use App\Models\Barcode;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Generator\CombGenerator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.register');
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
            'phone' => $request->phone,
            'type' => '1',
            'password' => Hash::make($request->password)
        ]);

        Barcode::create([
            'number' => '1'.time(),
            'type' => 1,
            'user_id' => $user->id
        ]);

        Auth::login($user);

        Mail::to($user)->send(new Registered());


        return redirect()->route('user.barcode');
    }
    public function create(Request $request){
        $users=User::where('type',1)->get();
        return view('admin.company.create',compact('users'));
    }
    public function profile(Request $request)
    {
        if(auth()->guard('web')->user()->type==1){
            $user_id=auth()->guard('web')->user()->id;
            $company=Company::where('user_id',$user_id)->first() ?? '';
            return view('company.profile',compact('company'));
        }
    }
    public function updateCompany()
    {
        if(auth()->guard('web')->user()->type==1){
            $user_id=auth()->guard('web')->user()->id;
            $company=Company::where('user_id',$user_id)->first() ?? '';
            return view('company.edit',compact('company'));
        }
    }

    public function view()
    {
        $companies=DB::table('companies')
        ->join('users', 'users.id', '=', 'companies.user_id')
        ->select('companies.*', 'users.name as user_name')
        ->get();
        return view('admin.company.index',compact('companies'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        $company= new Company();
        $company->name=$request->name;
        $company->user_id=$request->user_id;
        $company->email=$request->email;
        $company->phone=$request->phone;
        $company->website=$request->website;
        $company->street=$request->street;
        $company->city=$request->city;
        $company->state=$request->state;
        $company->address=$request->address;
        $company->description=$request->description;
        if($request->has('image')){
            $path = $request->file('image')->store('/images/company','public');
            $company->image=$path;
        }
        if($company->save()){
            return redirect()->route('admin-companies.view')->with('success','Company added Successfully');
        }else{
            return redirect()->route('admin-companies.view')->with('error','Failed to add company');
        }
    }
    public function viewdetail($id)
    {
        $company=DB::table('companies')->where('companies.id',$id)
        ->join('users', 'users.id', '=', 'companies.user_id')
        ->select('companies.*', 'users.name as user_name')
        ->first();
        return view('admin.company.view',compact('company'));
    }
    public function status($id,$status)
    {
        $company=Company::find($id);
        $company->status=$status;
        if($company->update()){
            return back()->with('success', 'Status change successfully');
        }else{
            return back()->with('error', 'Failed to change status');
        }
    }
    public function edit(Company $company,$id)
    {
        $company=Company::find($id);
        return view('admin.company.edit',compact('company'));
    }
    public function companyupdate(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $company=Company::find($id);
        $company->name=$request->name;
        $company->email=$request->email;
        $company->phone=$request->phone;
        $company->website=$request->website;
        $company->street=$request->street;
        $company->city=$request->city;
        $company->state=$request->state;
        $company->address=$request->address;
        $company->description=$request->description;
        if($request->has('image')){
            if($company->image){
                $image_path = public_path('storage/'.$company->image);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $path = $request->file('image')->store('/images/company','public');
            $company->image=$path;
        }

        if($company->update()){
            return redirect()->route('admin-companies.view')->with('success','Company Profile Updated Successfully');
        }else{
            return redirect()->route('admin-companies.view')->with('error','Failed to update company profile');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name'=>'required',
        ]);
        if (auth()->guard('web')->user()->type==1) {
            $user_id=auth()->guard('web')->user()->id;
            $company=Company::where('user_id', $user_id)->first() ?? new Company();
            $company->name=$request->name;
            $company->user_id=$user_id;
            $company->email=$request->email;
            $company->phone=$request->phone;
            $company->website=$request->website;
            $company->street=$request->street;
            $company->city=$request->city;
            $company->state=$request->state;
            $company->address=$request->address;
            $company->description=$request->description;
            if($request->has('image')){
                if($company->image){
                    $image_path = public_path('storage/'.$company->image);
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                
            $path = $request->file('image')->store('/images/company','public');
            $company->image=$path;
            }

            if($company->save()){
                return redirect()->back()->with('success','Company Profile Updated Successfully');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if($company->image){
            $image_path = public_path('storage/'.$company->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        if($company->destroy($company->id)){
            return redirect()->back()->with('success','Company delete successfully!');
        }else{
            return redirect()->back()->with('error','Failed to delete company!');
        }
    }
}
