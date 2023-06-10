<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $roles = Role::all();
        return view('role.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::where('name',$request->role_name)->first();
        if(!is_null($role)){
            return redirect(route('role.index'))->with('error','Role Already Exist..');
        }
        else{
            //dd($request);
            $role = Role::create(['description'=>$request->role_description,'name'=> $request->role_name]);
            // $permissions = $request->role;
            // $role->syncPermissions($permissions);
            return redirect(route('role.index'))->with('success','Role Create Successfully done..');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = [];
        $permissions = $role->getAllPermissions();
        for ($i=0; $i < count($permissions); $i++) { 
            array_push($permission,$permissions[$i]['name']);
        }
        
        return view('role.show',compact('role','permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function permissionToRole(Request $request, Role $role){
            $permissions = $request->role;
            //dd($permissions);
            $role->syncPermissions($permissions);
    }

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
}
