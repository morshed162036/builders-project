<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\settings\Unit;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:unit.index'])->only(['index']);
        $this->middleware(['permission:unit.create'])->only(['create']);
        $this->middleware(['permission:unit.edit'])->only(['edit']);
        $this->middleware(['permission:unit.delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::get();
        return view('settings.unit.index')->with(compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'unit'=> 'required'
            ];
        $this->validate($request,$rules);
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->unit = $request->unit;
        $unit->save();
        return redirect(route('unit.index'))->with('success','Unit Create Successfully!');
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
        $unit = Unit::findorFail($id);
        return view('settings.unit.edit')->with(compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name'=>'required',
            'unit'=> 'required'
            ];
        $this->validate($request,$rules);
        $unit = Unit::findorFail($id);
        $unit->name = $request->name;
        $unit->unit = $request->unit;
        $unit->update();
        return redirect(route('unit.index'))->with('success','Unit Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Unit::findorFail($id)->delete();
        return redirect(route('unit.index'))->with('success','Unit Delete Successfully');
    }
    public function updateUnitStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Unit::where('id',$data['unit_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'unit_id'=> $data['unit_id']]);
        }
    }
}
