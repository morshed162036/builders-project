<?php

namespace App\Http\Controllers;

use App\Models\Invoice\Invoice;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
