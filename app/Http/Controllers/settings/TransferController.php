<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\settings\Payment_transfer; 
use App\Models\settings\Payment_method; 

class TransferController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:transfer_balance.index'])->only(['index']);
        $this->middleware(['permission:transfer_balance.create'])->only(['create']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfers = Payment_transfer::with(['paymentFromAccount','paymentToAccount'])->get()->toArray();
        //dd($transfers);
        return view("settings.payment_method.transfer.index")->with(compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Payment_method::where('status','=','Active')->get();
        return view('settings.payment_method.transfer.create')->with(compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'to_id'=>'required',
            'from_id'=> 'required',
            'amount'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
            'reference'=> 'required'
        ];
        $this->validate($request,$rules);
        $transfer = new Payment_transfer();
        $transfer->from_id = $request->from_id;
        $transfer->to_id = $request->to_id;
        $transfer->balance = $request->amount;
        $transfer->reference = $request->reference;
        $transfer->remarks = $request->remarks;
        $transfer->save();

        $form = Payment_method::findorFail($request->from_id);
        $form->balance = $form->balance - $request->amount;
        $form->update();
        $to = Payment_method::findorFail($request->to_id);
        $to->balance = $to->balance + $request->amount;
        $to->update();
        return redirect(route('payment-transfer.index'))->with('success','Payment Transfer Successfully');
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
