<?php

namespace App\Http\Controllers\Return_product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Return_product\Client_refund;
use App\Models\Return_product\Client_refund_detail;
use App\Models\Accounts\Cashflow;
use App\Models\Product;
use App\Models\Stock\Product_stock;
use App\Models\Project\Client;
use App\Models\settings\Payment_method;
class ClientRefundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client_refunds = Client_refund::with('client','payment')->get();
        return view('return-product.client.index')->with(compact('client_refunds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get();
        $payment_methods = Payment_method::where('status','Active')->get();
        $products = Product::where('type','Product')->where('status','Active')->get();
        return view('return-product.client.create')->with(compact('clients','payment_methods','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'client_id'=>'required',
            'invoice_code'=>'required',
            'payment_amount'=>'required',
            'payment_method_id' => 'required',
            'date'=>'required',
            ];
        $this->validate($request,$rules);
        $payment_method = Payment_method::findorFail($request->payment_method_id);
        if($payment_method->balance >= $request->payment_amount)
        {
            $payment_method->balance -= $request->payment_amount;
            $payment_method->update();

            $cashflow = new Cashflow();
            $cashflow->payment_method_id = $request->payment_method_id;
            $cashflow->cash_out = $request->payment_amount;
            $cashflow->description = 'Product Return From Client';
            $cashflow->save();

        }
        $clientrefund = new Client_refund();
        $clientrefund->client_id = $request->client_id;
        $clientrefund->invoice_code = $request->invoice_code;
        $clientrefund->date = $request->date;
        $clientrefund->payment_method_id = $request->payment_method_id;
        $clientrefund->amount = $request->payment_amount;
        $clientrefund->save();
        $clientrefund_id = $clientrefund->id;

        foreach($request['group-product'] as $product)
        {
            if($product['product_id'] != null){
                $clientrefund_details = new Client_refund_detail();
                $clientrefund_details->client_refund_id = $clientrefund_id;
                $clientrefund_details->product_id = $product['product_id'];
                $clientrefund_details->qnt = $product['qnt'];
                $clientrefund_details->price = $product['unit_price'];
                $clientrefund_details->product_condition = $product['product_condition'];
                // $clientrefund_details->total_price = $product['unit_price'] * $product['qnt'];
                if($product['product_condition'] == 'Exchange')
                {
                    $clientrefund_details->status = 'Return_to_stock';
                    $product_stock = Product_stock::where('product_id',$product['product_id'])->get()->first();
                    //dd($product_stock);
                    $product_stock->available += $product['qnt'];
                    $product_stock->update();
                }
                $clientrefund_details->save();
            }
            else{
                return redirect(route('client-return-product.index'))->with('error','Product not select');
            }
        }

        return redirect(route('client-return-product.index'))->with('success','Refund Product Add Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $refund_products = Client_refund_detail::with('product')->where('client_refund_id',$id)->get();
        return view('return-product.client.show')->with(compact('refund_products'));
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
