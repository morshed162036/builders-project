<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::get();
        return view('designation.index')->with(compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('designation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $designation = new Designation();
        $designation->title = $request->title;
        $designation->description = $request->description;
        $designation->type = $request->type;
        $designation->save();
        return redirect(route('designation.index'))->with('success','Designation Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        return view('designation.edit')->with(compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        $designation->title = $request->title;
        $designation->description = $request->description;
        $designation->type = $request->type;
        $designation->update();
        return redirect(route('designation.index'))->with('success','Designation Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        return redirect(route('designation.index'))->with('success','Designation Delete Successfully');
    }
    public function updateDesignationStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Designation::where('id',$data['designation_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'designation_id'=> $data['designation_id']]);
        }
    }
}
