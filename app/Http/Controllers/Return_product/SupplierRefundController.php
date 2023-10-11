<?php

namespace App\Http\Controllers\Return_product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Accounts\Cashflow;
use App\Models\settings\Payment_method;
use App\Models\Return_product\Supplier_refund;
use App\Models\Return_product\Supplier_refund_detail;
use App\Models\Return_product\Client_refund;
use App\Models\Return_product\Client_refund_detail;
class SupplierRefundController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:product_return_supplier.index'])->only(['index']);
        $this->middleware(['permission:product_return_supplier.create'])->only(['create']);
        $this->middleware(['permission:product_return_supplier.show'])->only(['show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return_products = Supplier_refund::with('supplier','payment')->get();
        //dd($return_products);
        return view('return-product.supplier.index')->with(compact('return_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::where('status','Active')->get();
        $payment_methods = Payment_method::where('status','Active')->get();
        $client_refund_details = Client_refund_detail::with('product','client_refund')->where('status','Return_from_client')->get();
        return view('return-product.supplier.create')->with(compact('suppliers','payment_methods','client_refund_details'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'supplier_id'=>'required',
            'payment_amount'=>'required',
            'payment_method_id' => 'required',
            'date'=>'required',
            ];
        $this->validate($request,$rules);

        $payment_method = Payment_method::findorFail($request->payment_method_id);
        
        $payment_method->balance += $request->payment_amount;
        $payment_method->update();

        $cashflow = new Cashflow();
        $cashflow->payment_method_id = $request->payment_method_id;
        $cashflow->cash_in = $request->payment_amount;
        $cashflow->description = 'Damage Product Return To Supplier';
        $cashflow->save();

        $supplier_refund = new Supplier_refund();
        $supplier_refund->supplier_id = $request->supplier_id;
        $supplier_refund->date = $request->date;
        $supplier_refund->payment_method_id = $request->payment_method_id;
        $supplier_refund->amount = $request->payment_amount;
        $supplier_refund->save();
        $supplier_refund_id = $supplier_refund->id;

        foreach($request['group-product'] as $product)
        {
            if($product['client_refund_id'] != null){
                $supplier_refund_details = new Supplier_refund_detail();
                $supplier_refund_details->supplier_refund_id = $supplier_refund_id;
                $supplier_refund_details->client_refund_id = $product['client_refund_id'];
                $supplier_refund_details->price = $product['unit_price'];
                $supplier_refund_details->save();

                $client_refund_details = Client_refund_detail::findorFail($product['client_refund_id']);
                $client_refund_details->status = 'Return_to_supplier';
                $client_refund_details->update();
            }
            else{
                return redirect(route('supplier-return-product.index'))->with('error','Product not select');
            }
        }
        return redirect(route('supplier-return-product.index'))->with('success','Return Product To Supplier Done');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier_refund_details = Supplier_refund_detail::with('client_refund')->where('supplier_refund_id',$id)->get();
        //dd($supplier_refund_details);
        return view('return-product.supplier.show')->with(compact('supplier_refund_details'));
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
