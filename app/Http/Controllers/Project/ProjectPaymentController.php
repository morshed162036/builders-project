<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\Project_payment;
use App\Models\Project\Project;
use App\Models\settings\Payment_method;
class ProjectPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Project_payment::with('project','payment')->get();
        return view('project-management.project-setup.project-payment.index')->with(compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::get();
        $payment_methods = Payment_method::where('status','Active')->get();
        return view('project-management.project-setup.project-payment.create')->with(compact('projects','payment_methods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'date' => 'required',
            'project_id' => 'required',
            'payment_method_id' => 'required',
            'amount' => 'required|numeric',
        ];
        $this->validate($request,$rules);

        $project_payment = new Project_payment();
        $project_payment->project_id = $request->project_id;
        $project_payment->payment_method_id = $request->payment_method_id;
        $project_payment->amount = $request->amount;
        $project_payment->date = $request->date;
        $project_payment->save();

        $method = Payment_method::findorFail($request->payment_method_id);
        $method->balance += $request->amount;
        $method->update();

        return redirect(route('project-payment.index'))->with('success','Payment Create Successfully');
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
