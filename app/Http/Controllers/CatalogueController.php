<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;

class CatalogueController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:catalogue.index'])->only(['index']);
        $this->middleware(['permission:catalogue.create'])->only(['create']);
        $this->middleware(['permission:catalogue.edit'])->only(['edit']);
        $this->middleware(['permission:catalogue.delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogues = Catalogue::get();
        return view('catalogue.index')->with(compact('catalogues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catalogue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'catalogue_name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
        $this->validate($request,$rules);
        $catalogue = new Catalogue();
        $catalogue->name = $request->catalogue_name;
        $catalogue->save();
        return redirect(route('catalogue.index'))->with('success','Catalogue Create Successfully!');

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
        $catalogue = Catalogue::where('id',$id)->get()->first();

        return view('catalogue.edit')->with(compact('catalogue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'catalogue_name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
        $this->validate($request,$rules);
        $catalogue = Catalogue::findorFail($id);
        $catalogue->name = $request->catalogue_name;
        $catalogue->update();
        return redirect(route('catalogue.index'))->with('success','Catalogue Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Catalogue::findorFail($id)->delete();
        return redirect(route('catalogue.index'))->with('success','Catalogue Delete Successfully!');
    }
    public function updateCatalogueStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Catalogue::where('id',$data['catalogue_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'catalogue_id'=> $data['catalogue_id']]);
        }
    }
}
