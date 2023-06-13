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
        return view('settings.payment_method.index')->with(compact('payment_methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.payment_method.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'method'=> 'required'
            ];
        $this->validate($request,$rules);
        $CopyCheck = Payment_method::where('name',$request->name)->get()->toArray();
        if($CopyCheck != null){
            return redirect(route('payment-method.index'))->with('error','Payment_method Already Exist');
        }
        else{
            $Payment_method = new Payment_method();
            $Payment_method->name = $request->name;
            $Payment_method->type = $request->method;
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
        return view('settings.payment_method.edit')->with(compact('payment_method'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name'=>'required',
            'method'=> 'required'
            ];
        $this->validate($request,$rules);
        if($CopyCheck != null){
            return redirect(route('payment-method.index'))->with('error','Payment_method Already Exist');
        }
        else{
            $Payment_method = Payment_method::findorFail($id);
            $Payment_method->name = $request->name;
            $Payment_method->type = $request->method;
            $Payment_method->update();
            return redirect(route('payment-method.index'))->with('success','Payment_method Update Successfully!');
        }
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
