<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts\Chart_of_account;
use App\Models\Accounts\Accounts_group;
class ChartofAccountController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:chart_of_account.index'])->only(['index']);
        $this->middleware(['permission:chart_of_account.create'])->only(['create']);
        $this->middleware(['permission:chart_of_account.edit'])->only(['edit']);
        $this->middleware(['permission:chart_of_account.delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Chart_of_account::with('accountGroup')->get()->toArray();
        //dd($accounts);
        return view('accounts.chart_of_accounts.index')->with(compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Accounts_group::get();
        return view('accounts.chart_of_accounts.create')->with(compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'account_group'=>'required'
        ];
        $this->validate($request,$rules);
        $account = new Chart_of_account();
        $account->name = $request->name;
        $account->description = $request->description;
        $account->accounts_group_id = $request->account_group;
        $account->save();
        return redirect(route('chart-of-account.index'))->with('success','Account Create Successfully!');
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
        $account = Chart_of_account::with('accountGroup')->where('id',$id)->get()->first();
        $groups = Accounts_group::get();
        //dd($account->id);
        return view('accounts.chart_of_accounts.edit')->with(compact('account','groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name'=>'required',
            'account_group'=>'required'
        ];
        $this->validate($request,$rules);
        $account = Chart_of_account::findorFail($id);
        $account->name = $request->name;
        $account->description = $request->description;
        $account->accounts_group_id = $request->account_group;
        $account->update();
        return redirect(route('chart-of-account.index'))->with('success','Account Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Chart_of_account::findorFail($id)->delete();
        return redirect(route('chart-of-account.index'))->with('success','Account Delete Successfully!');
    }
}
