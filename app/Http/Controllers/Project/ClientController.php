<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\Client;
use App\Models\Invoice\Invoice;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::get();
        return view('project-management.client.index')->with(compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project-management.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'require'
        ];
        $this->validate($request,$rules);
        $client = new Client();
        $client->name = $request->client_name;
        $client->company = $request->company;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->remarks = $request->remarks;
        $client->status = $request->status;
        $client->save();
        return redirect(route('client.index'))->with('success','Client Create Success!');
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
        $client = Client::findorFail($id);
        return view('project-management.client.edit')->with(compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'require'
        ];
        $this->validate($request,$rules);
        $client = Client::findorFail($id);
        $client->name = $request->client_name;
        $client->company = $request->company;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->remarks = $request->remarks;
        $client->status = $request->status;
        $client->update();
        return redirect(route('client.index'))->with('success','Client Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::findorFail($id)->delete();
        return redirect(route('client.index'))->with('success','Client Delete Success!');
    }

    public function advanceClient()
    {
        $clients = Invoice::with('client')->where('invoice_type','Sell')->where('payment_status','Advance')->get();
        //dd($clients);
        return view('project-management.client.advance')->with(compact('clients'));
    }
    public function payableClient()
    {
        $clients = Invoice::with('client')->where('invoice_type','Sell')->where('payment_status','Due')->orWhere('payment_status','Partial')->get();
        //dd($clients);
        return view('project-management.client.payable')->with(compact('clients'));
    }

}
