<?php

namespace App\Http\Controllers;

use App\Models\Payroll\Benefit;
use Illuminate\Http\Request;
class BenefitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:benefit.index'])->only(['index']);
        $this->middleware(['permission:benefit.create'])->only(['create']);
        $this->middleware(['permission:benefit.edit'])->only(['edit']);
        $this->middleware(['permission:benefit.delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benefits = Benefit::get();
        return view('payroll.benefits.index')->with(compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payroll.benefits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $benefit = new Benefit();
        $benefit->title = $request->title;
        $benefit->description = $request->description;
        $benefit->save();
        return redirect(route('benefits.index'))->with('success','Benefit Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Benefit $benefit)
    {
        return view('payroll.benefits.edit')->with(compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Benefit $benefit)
    {
        $benefit->title = $request->title;
        $benefit->description = $request->description;
        $benefit->update();
        return redirect(route('benefits.index'))->with('success','Benefit Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Benefit $benefit)
    {
        $benefit->delete();
        return redirect(route('benefits.index'))->with('success','Benefit Delete Successfully');
    }
}
