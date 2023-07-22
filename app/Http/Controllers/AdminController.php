<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payroll.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $valodate = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);

            if(Auth::guard('web')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'Active'])){
                return redirect('dashboard');
                }
            else{
                return redirect()->back()->with('error','Invalid Email or Password');
            }
        }
        return view('login');
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}
