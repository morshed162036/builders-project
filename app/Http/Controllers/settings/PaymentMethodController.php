<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\settings\Payment_method;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_methods = Payment_method::get();
        return view('settings.payment_method.bank.index')->with(compact('payment_methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.payment_method.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'bank_name'=>'required',
            'branch'=> 'required',
            'account_name'=> 'required',
            'account_holder'=> 'required',
            'account_number'=> 'required',
            'phone'=> 'required|min:11',
            'account_balance'=> 'required|regex:/^\d+(\.\d{1,2})?$/'
            ];
        $this->validate($request,$rules);
        $CopyCheck = Payment_method::where('account_no',$request->account_number)->get()->toArray();
        if($CopyCheck != null){
            return redirect(route('payment-method.index'))->with('error','Payment_method Already Exist');
        }
        else{
            //dd($request->all());
            $Payment_method = new Payment_method();
            $Payment_method->bank_name = $request->bank_name;
            $Payment_method->branch = $request->branch;
            $Payment_method->account_name = $request->account_name;
            $Payment_method->account_holder = $request->account_holder;
            $Payment_method->account_no = $request->account_number;
            $Payment_method->phone = $request->phone;
            $Payment_method->balance = $request->account_balance;
            $Payment_method->save();
            return redirect(route('payment-method.index'))->with('success','Payment_method Create Successfully!');
        }
        
        
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
        $payment_method = Payment_method::findorFail($id);
        return view('settings.payment_method.bank.edit')->with(compact('payment_method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'bank_name'=>'required',
            'branch'=> 'required',
            'account_name'=> 'required',
            'account_holder'=> 'required',
            'account_number'=> 'required',
            'phone'=> 'required|min:11',
            'account_balance'=> 'required|regex:/^\d+(\.\d{1,2})?$/'
            ];
        $this->validate($request,$rules);
        $Payment_method = Payment_method::findorFail($id);
        $Payment_method->bank_name = $request->bank_name;
        $Payment_method->branch = $request->branch;
        $Payment_method->account_name = $request->account_name;
        $Payment_method->account_holder = $request->account_holder;
        $Payment_method->phone = $request->phone;
        $Payment_method->update();
        return redirect(route('payment-method.index'))->with('success','Payment_method Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment_method::findorFail($id)->delete();
        return redirect(route('payment-method.index'))->with('success','Payment Method Delete successfully!');
    }
    public function updateMethodStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Payment_method::where('id',$data['method_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'method_id'=> $data['method_id']]);
        }
    }
}
