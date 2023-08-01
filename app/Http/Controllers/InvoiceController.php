<?php

namespace App\Http\Controllers;

use App\Models\Invoice\Invoice;
use App\Models\Invoice\Invoice_detail;
use App\Models\Invoice\Invoice_payment;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\settings\Payment_method;
use App\Models\Product;
use App\Models\Accounts\Cashflow;
use App\Models\Project\Client;
use App\Models\Project\Project;
use App\Models\Stock\Product_stock;
use App\Models\Stock\Machine_stock;
use App\Models\Stock\Machine_stock_detail;
use App\Models\Stock\Product_stock_detail;
use App\Models\settings\Unit;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('details')->get();
        //dd($invoices);
        return view('inventory-management.invoice.index')->with(compact('invoices'));
    }
    public function purchaseIndex(){
        $invoices = Invoice::with('supplier')->where('invoice_type','Purchase')->get();
        //dd($invoices);
        return view('inventory-management.invoice.purchase_index')->with(compact('invoices'));
    }
    public function sellIndex(){
        //dd("sell");
        $invoices = Invoice::with('client')->where('invoice_type','Sell')->get();
        //dd($invoices);
        return view('inventory-management.invoice.sell_index')->with(compact('invoices'));
    }
    public function projectIndex(){
        //dd("project");
        $invoices = Invoice::with('project')->where('invoice_type','Project')->get();
        //dd($invoices);
        return view('inventory-management.invoice.project_index')->with(compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }
    public function purchaseCreate()
    {
        
        $payment_methods = Payment_method::get();
        $suppliers = Supplier::get();
        $units = Unit::where('status','Active')->get();
        $products = Product::where('type','Product')->where('status','Active')->get();
        $machines = Product::where('type','Machine')->where('status','Active')->get();
        
        //dd($payment_methods);
        return view('inventory-management.invoice.purchase_create')->with(compact('suppliers','payment_methods','units','products','machines'));
    }
    public function sellCreate()
    {
        $payment_methods = Payment_method::get();
        $units = Unit::where('status','Active')->get();
        $clients = Client::get();
        $products = Product::where('type','Product')->where('status','Active')->get();
        //dd($products);
        return view('inventory-management.invoice.sell_create')->with(compact('products','units','clients','payment_methods'));
    }
    public function projectCreate()
    {
        $products = Product::where('type','Product')->where('status','Active')->get();
        $projects = Project::where('status','Start')->orWhere('status','Ongoing')->get();
        return view('inventory-management.invoice.project_create')->with(compact('products','projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        if($request->invoice_type == 'Purchase')
        {
            $total_item = 0;
            $total_amount = 0;
            $invoice = new Invoice();
            $invoice->supplier_id = $request->supplier_id;
            $invoice->invoice_code = $request->invoice_code;
            $invoice->issue_date = $request->issue_date;
            $invoice->due_date = $request->due_date;
            $invoice->invoice_type = $request->invoice_type;
            $invoice->discount = $request->discount;
            if($request->payment_amount != null && $request->payment_method_id != 0){
                $invoice->paid_amount = $request->payment_amount;
                $payment_method = Payment_method::where('id',$request->payment_method_id)->get()->first();
                if($payment_method->balance >= $request->payment_amount)
                {
                    $payment_method->balance -= $request->payment_amount;
                    $payment_method->update();
                    $invoice_payment = new Invoice_payment();
                    $invoice_payment->payment_method_id = $request->payment_method_id;
                    $invoice_payment->amount = $request->payment_amount;
                    $invoice_payment->save();
                    $invoice_payment_id = $invoice_payment->id;

                    $cashflow = new Cashflow();
                    $cashflow->payment_method_id = $request->payment_method_id;
                    $cashflow->cash_out = $request->payment_amount;
                    $cashflow->description = "(".$request->invoice_code.") Purchase Invoice Payment";
                    $cashflow->save();
                }
                else
                {
                     return redirect(route('purchase_index'))->with('error','No Sufficient Balance');
                }
               
            }
            $invoice->payment_status = $request->payment_status;
            $invoice->save();
            $invoice_id = $invoice->id;
            $invoice_payment = Invoice_payment::findorFail($invoice_payment_id);
            $invoice_payment->invoice_id = $invoice_id;
            $invoice_payment->update();

            foreach($request['group-product'] as $product)
            {
                if($product['product_id'] != null){
                    $invoice_details = new Invoice_detail();
                    $invoice_details->invoice_id = $invoice_id;
                    $invoice_details->product_id = $product['product_id'];
                    $invoice_details->sku = $product['sku'];
                    $invoice_details->quantity = $product['qnt'];
                    $invoice_details->unit_id = $product['unit_id'];
                    $invoice_details->unit_price = $product['unit_price'];
                    $invoice_details->total_price = $product['unit_price'] * $product['qnt'];

                    $total_item++;
                    $total_amount += $product['unit_price'] * $product['qnt'];
                    $invoice_details->save();
                    if($request->payment_status != 'Advance')
                    {
                        $product_stock = Product_stock::where('product_id',$product['product_id'])->get()->first();
                        //dd($product_stock);
                        $product_stock_id  = $product_stock->id;
                        $product_stock->stock += $product['qnt'];
                        $product_stock->available += $product['qnt'];
                        $product_stock->update();

                        $product_stock_details = new Product_stock_detail();
                        $product_stock_details->product_stock_id =  $product_stock_id;
                        $product_stock_details->invoice_id = $invoice_id;
                        $product_stock_details->sku = $product['sku'];
                        $product_stock_details->purchase_unit_price = $product['unit_price'];
                        $product_stock_details->qnt += $product['qnt'];
                        $product_stock_details->available += $product['qnt'];
                        $product_stock_details->save();
                    }
                }
            }
            foreach($request['group-machine'] as $machine)
            {
                if($machine['machine_id'] != null){
                    $invoice_details = new Invoice_detail();
                    $invoice_details->invoice_id = $invoice_id;
                    $invoice_details->product_id = $machine['machine_id'];
                    $invoice_details->sku = $machine['sku'];
                    $invoice_details->quantity = $machine['qnt'];
                    $invoice_details->unit_id = $machine['unit_id'];
                    $invoice_details->unit_price = $machine['unit_price'];
                    $invoice_details->total_price = $machine['unit_price'] * $machine['qnt'];

                    $total_item++;
                    $total_amount += $machine['unit_price'] * $machine['qnt'];
                    $invoice_details->save();
                    if($request->payment_status != 'Advance')
                    {
                        $machine_stock = Machine_stock::where('product_id',$machine['machine_id'])->get()->first();
                        $machine_stock_id  = $machine_stock->id;
                        $machine_stock->stock += $machine['qnt'];
                        $machine_stock->available += $machine['qnt'];
                        $machine_stock->update();

                        $machine_stock_details = new Machine_stock_detail();
                        $machine_stock_details->machine_stock_id =  $machine_stock_id;
                        $machine_stock_details->invoice_id = $invoice_id;
                        $machine_stock_details->sku = $machine['sku'];
                        $machine_stock_details->purchase_unit_price = $machine['unit_price'];
                        $machine_stock_details->save();
                    }
                } 
            }
           // dd($total_amount);
            $invoice = Invoice::findorFail($invoice_id);
            $invoice->total_item = $total_item;
            $invoice->total_amount = $total_amount;
            $invoice->update();

            return redirect(route('purchase_index'))->with('success','Purchase Invoice Create Successfully');

        }
        elseif ($request->invoice_type == 'Sell') 
        {
            //dd($request->all());
            $total_item = 0;
            $total_amount = 0;
            $invoice = new Invoice();
            $invoice->client_id = $request->client_id;
            $invoice->invoice_code = $request->invoice_code;
            $invoice->issue_date = $request->issue_date;
            $invoice->due_date = $request->due_date;
            $invoice->invoice_type = $request->invoice_type;
            $invoice->discount = $request->discount;
            $invoice->payment_status = $request->payment_status;
            foreach($request['group-product'] as $product)
            {
                if($product['product_id'] != null)
                {
                    if($request->payment_status != 'Advance')
                    {
                        $product_stock = Product_stock::with('product')->where('product_id',$product['product_id'])->get()->first();
                        //dd($product_stock);
                        if($product_stock->available >= $product['qnt'])
                        {
                            $product_stock_id  = $product_stock->id;
                            $product_stock->available -= $product['qnt'];
                            $product_stock->update();
                            $invoice->save();
                            $invoice_id = $invoice->id;

                            // $product_stock_details = new Product_stock_detail();
                            // $product_stock_details->product_stock_id =  $product_stock_id;
                            // $product_stock_details->invoice_id = $invoice_id;
                            // $product_stock_details->sku = $product['sku'];
                            // $product_stock_details->purchase_unit_price = $product['unit_price'];
                            // $product_stock_details->qnt += $product['qnt'];
                            // $product_stock_details->available += $product['qnt'];
                            // $product_stock_details->save();
                        }
                        else{
                            return redirect(route('sell_index'))->with('error',' Not Enough Stock For -> '.$product_stock->product->title);
                        }
                        
                    }
                    if($request->payment_status == 'Advance')
                    {
                        $product_stock = Product_stock::with('product')->where('product_id',$product['product_id'])->get()->first();
                        //dd($product_stock);
                        if($product_stock->available < $product['qnt'])
                        {
                            return redirect(route('sell_index'))->with('error',' Not Enough Stock For -> '.$product_stock->product->title);
                        }
                        $invoice->save();
                        $invoice_id = $invoice->id;
                    }
                    $invoice_details = new Invoice_detail();
                    $invoice_details->invoice_id = $invoice_id;
                    $invoice_details->product_id = $product['product_id'];
                    //$invoice_details->sku = $product['sku'];
                    $invoice_details->quantity = $product['qnt'];
                    //$invoice_details->unit_id = $product['unit_id'];
                    $invoice_details->unit_price = $product['unit_price'];
                    $invoice_details->total_price = $product['unit_price'] * $product['qnt'];

                    $total_item++;
                    $total_amount += $product['unit_price'] * $product['qnt'];
                    $invoice_details->save();
                    
                }
            }
            if($request->payment_amount != null && $request->payment_method_id != 0){
                $invoice = Invoice::findorFail($invoice_id);
                $invoice->paid_amount = $request->payment_amount;
                $invoice->update();
                $payment_method = Payment_method::where('id',$request->payment_method_id)->get()->first();
                $payment_method->balance += $request->payment_amount;
                $payment_method->update();
                $invoice_payment = new Invoice_payment();
                $invoice_payment->payment_method_id = $request->payment_method_id;
                $invoice_payment->amount = $request->payment_amount;
                $invoice_payment->save();
                $invoice_payment_id = $invoice_payment->id; 

                $cashflow = new Cashflow();
                $cashflow->payment_method_id = $request->payment_method_id;
                $cashflow->cash_out = $request->payment_amount;
                $cashflow->description = "(".$request->invoice_code.") Sale Invoice Payment";
                $cashflow->save();
            }
            $invoice_payment = Invoice_payment::findorFail($invoice_payment_id);
            $invoice_payment->invoice_id = $invoice_id;
            $invoice_payment->update();

           
                // dd($total_amount);
            $invoice = Invoice::findorFail($invoice_id);
            $invoice->total_item = $total_item;
            $invoice->total_amount = $total_amount;
            $invoice->update();

            return redirect(route('sell_index'))->with('success','Sale Invoice Create Successfully');
        }
        elseif ($request->invoice_type == 'Project') {
            dd($request->all());
            $total_item = 0;
            $total_amount = 0;
            $invoice = new Invoice();
            $invoice->project_id = $request->project_id;
            $invoice->invoice_code = $request->invoice_code;
            $invoice->issue_date = $request->issue_date;
            // $invoice->due_date = $request->due_date;
            $invoice->invoice_type = $request->invoice_type;
            // $invoice->discount = $request->discount;
            $invoice->payment_status = 'Project';

            foreach($request['group-product'] as $product)
            {
                if($product['product_id'] != null)
                {
                    $product_stock = Product_stock::with('product')->where('product_id',$product['product_id'])->get()->first();
                        //dd($product_stock);
                        $product_unit_price = $product_stock->unit_price;
                        if($product_stock->available >= $product['qnt'])
                        {
                            $product_stock_id  = $product_stock->id;
                            $product_stock->available -= $product['qnt'];
                            $product_stock->update();
                            $invoice->save();
                            $invoice_id = $invoice->id;

                            // $product_stock_details = new Product_stock_detail();
                            // $product_stock_details->product_stock_id =  $product_stock_id;
                            // $product_stock_details->invoice_id = $invoice_id;
                            // $product_stock_details->sku = $product['sku'];
                            // $product_stock_details->purchase_unit_price = $product['unit_price'];
                            // $product_stock_details->qnt += $product['qnt'];
                            // $product_stock_details->available += $product['qnt'];
                            // $product_stock_details->save();
                        }
                        else{
                            return redirect(route('project_index'))->with('error',' Not Enough Stock For -> '.$product_stock->product->title);
                        }
                        
                    $invoice_details = new Invoice_detail();
                    $invoice_details->invoice_id = $invoice_id;
                    $invoice_details->product_id = $product['product_id'];
                    //$invoice_details->sku = $product['sku'];
                    $invoice_details->quantity = $product['qnt'];
                    //$invoice_details->unit_id = $product['unit_id'];
                    $invoice_details->unit_price = $product_unit_price;
                    $invoice_details->total_price = $product_unit_price * $product['qnt'];

                    $total_item++;
                    $total_amount += $product_unit_price * $product['qnt'];
                    $invoice_details->save();
                    
                }
            }
            $invoice = Invoice::findorFail($invoice_id);
            $invoice->total_item = $total_item;
            $invoice->total_amount = $total_amount;
            $invoice->update();
        }
        return redirect(route('project_index'))->with('success','Project Invoice Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $invoice = $invoice::with('details','supplier','client','project')->where('id',$invoice->id)->get()->first();
        //dd($invoice);
        return view('inventory-management.invoice.show')->with(compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }
    public function invoiceEdit(string $slug, string $id)
    {
        $payment_methods = Payment_method::get();
        if($slug == 'purchase')
        {
            $invoice = Invoice::with('details','supplier','client','project')->where('id',$id)->get()->first();
            //dd($invoice);
            return view('inventory-management.invoice.purchase_edit')->with(compact('invoice','payment_methods'));
        }
        elseif ($slug == 'sell') {
            $invoice = Invoice::with('details','supplier','client','project')->where('id',$id)->get()->first();
            //dd($invoice);
            return view('inventory-management.invoice.sell_edit')->with(compact('invoice','payment_methods'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //dd($request->all());
        if($request->invoice_type == 'Purchase')
        {
            $invoice->due_date = $request->due_date;
            
            if($request->payment_amount != null && $request->payment_method_id != 0){
                $invoice->paid_amount += $request->payment_amount;
                $payment_method = Payment_method::where('id',$request->payment_method_id)->get()->first();
                if($payment_method->balance >= $request->payment_amount)
                {
                    $payment_method->balance -= $request->payment_amount;
                    $payment_method->update();
                    $invoice_payment = new Invoice_payment();
                    $invoice_payment->invoice_id = $invoice->id;
                    $invoice_payment->payment_method_id = $request->payment_method_id;
                    $invoice_payment->amount = $request->payment_amount;
                    $invoice_payment->save();

                    $cashflow = new Cashflow();
                    $cashflow->payment_method_id = $request->payment_method_id;
                    $cashflow->cash_out = $request->payment_amount;
                    $cashflow->description = "(".$request->invoice_code.") Purchase Invoice Payment";
                    $cashflow->save();
                }
                else
                {
                     return redirect(route('purchase_index'))->with('error','No Sufficient Balance');
                }
               
            }
            if($invoice->payment_status == 'Advance' && $request->payment_status != 'Advance')
            {
                foreach($request['group-product'] as $product)
                {
                    if($product['product_id'] != null)
                    {
                        $product_stock = Product_stock::where('product_id',$product['product_id'])->get()->first();
                        //dd($product_stock);
                        $product_stock_id  = $product_stock->id;
                        $product_stock->stock += $product['qnt'];
                        $product_stock->available += $product['qnt'];
                        $product_stock->update();

                        $product_stock_details = new Product_stock_detail();
                        $product_stock_details->product_stock_id =  $product_stock_id;
                        $product_stock_details->invoice_id = $invoice->id;
                        $product_stock_details->sku = $product['sku'];
                        $product_stock_details->purchase_unit_price = $product['unit_price'];
                        $product_stock_details->qnt += $product['qnt'];
                        $product_stock_details->available += $product['qnt'];
                        $product_stock_details->save();
                    }
                }
            }
            foreach($request['group-machine'] as $machine)
            {
                if($machine['machine_id'] != null)
                {
                        $machine_stock = Machine_stock::where('product_id',$machine['machine_id'])->get()->first();
                        $machine_stock_id  = $machine_stock->id;
                        $machine_stock->stock += $machine['qnt'];
                        $machine_stock->available += $machine['qnt'];
                        $machine_stock->update();

                        $machine_stock_details = new Machine_stock_detail();
                        $machine_stock_details->machine_stock_id =  $machine_stock_id;
                        $machine_stock_details->invoice_id = $invoice->id;
                        $machine_stock_details->sku = $machine['sku'];
                        $machine_stock_details->purchase_unit_price = $machine['unit_price'];
                        $machine_stock_details->save();
                }
            }
            $invoice->payment_status = $request->payment_status;
            $invoice->update();
            return redirect(route('purchase_index'))->with('success','Purchase Invoice Update Successfully');

        }
        if($request->invoice_type == 'Sell')
        {
            $invoice->due_date = $request->due_date;
            
            if($request->payment_amount != null && $request->payment_method_id != 0){
                $invoice->paid_amount += $request->payment_amount;
                $payment_method = Payment_method::where('id',$request->payment_method_id)->get()->first();
                $payment_method->balance += $request->payment_amount;
                $payment_method->update();
                $invoice_payment = new Invoice_payment();
                $invoice_payment->invoice_id = $invoice->id;
                $invoice_payment->payment_method_id = $request->payment_method_id;
                $invoice_payment->amount = $request->payment_amount;
                $invoice_payment->save();

                $cashflow = new Cashflow();
                $cashflow->payment_method_id = $request->payment_method_id;
                $cashflow->cash_in = $request->payment_amount;
                $cashflow->description = "(".$request->invoice_code.") Sale Invoice Payment";
                $cashflow->save();
               
            }
            if($invoice->payment_status == 'Advance' && $request->payment_status != 'Advance')
            {
                foreach($request['group-product'] as $product)
                {
                    $product_stock = Product_stock::with('product')->where('product_id',$product['product_id'])->get()->first();
                    //dd($product_stock);
            
                    $product_stock_id  = $product_stock->id;
                    $product_stock->available -= $product['qnt'];
                    $product_stock->update();
                }
            }
            $invoice->payment_status = $request->payment_status;
            $invoice->update();
            return redirect(route('sell_index'))->with('success','Sale Invoice Update Successfully');
        }
    }

    public function paymentDetails(string $id)
    {
        $invoice  = Invoice::with('payment')->findorFail($id);
        //dd($invoice);
        return view('inventory-management.invoice.payment_details')->with(compact('invoice'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
