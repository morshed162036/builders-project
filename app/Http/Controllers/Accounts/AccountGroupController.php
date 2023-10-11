<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts\Accounts_group;
use Spatie\Permission\Models\Permission;

class AccountGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:accounts_group.index'])->only(['index']);
        $this->middleware(['permission:accounts_group.create'])->only(['create']);
        $this->middleware(['permission:accounts_group.edit'])->only(['edit']);
        $this->middleware(['permission:accounts_group.delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Accounts_group::get();
        return view('accounts.accounts_groups.index')->with(compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.accounts_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
        $this->validate($request,$rules);
        $group = new Accounts_group();
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();
        return redirect(route('accounts.index'))->with('success','Accounts Group Create Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $group = Accounts_group::findorFail($id);
        return view('accounts.accounts_groups.edit')->with(compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
        $this->validate($request,$rules);
        $group = Accounts_group::findorFail($id);
        $group->name = $request->name;
        $group->description = $request->description;
        $group->update();
        return redirect(route('accounts.index'))->with('success','Accounts Group Update Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Accounts_group::findorFail($id)->delete();
        return redirect(route('accounts.index'))->with('success','Accounts Group Delete Successfully!');
    }
}
