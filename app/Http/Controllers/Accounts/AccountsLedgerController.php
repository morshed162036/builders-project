<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts\Chart_of_account;
use App\Models\Accounts\Accounts_ledger;
use App\Models\settings\Payment_method;
class AccountsLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ledgers = Accounts_ledger::with('account','payment')->get();
        return view('accounts.accounts_ledgers.index')->with(compact('ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Chart_of_account::get();
        $payment_methods = Payment_method::where('status','Active')->get();
        return view('accounts.accounts_ledgers.create')->with(compact('accounts','payment_methods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'date' => 'required',
            'account_id' => 'required',
            'type' => 'required',
            'payment_id' => 'required',
            'amount' => 'required|numeric',
        ];
        $this->validate($request,$rules);

        $payment_method = Payment_method::findorFail($request->payment_id);
        if($request->type == 'Credit')
        {
            //dd($payment_method);
            // tk account theke ber hole
            if($payment_method->balance >= $request->amount)
            {
                $payment_method->balance -= $request->amount;
                $payment_method->update();
            }
            else {
                return redirect(route('accounts-ledger.index'))->with('error','Payment Method Has No Sufficient Balance');
            }
            
        }
        else{
            // tk account e dhukle
            $payment_method->balance += $request->amount;
            $payment_method->update();
        }

        $ledger = new Accounts_ledger();
        $ledger->date = $request->date;
        $ledger->chart_of_account_id = $request->account_id;
        $ledger->type = $request->type;
        $ledger->payment_method_id = $request->payment_id;
        $ledger->description = $request->description;
        $ledger->amount = $request->amount;
        $ledger->post_ref = $request->post_ref;
        $ledger->save();

        return redirect(route('accounts-ledger.index'))->with('success',$request->type.' Voucher Create Successfully');
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
}
