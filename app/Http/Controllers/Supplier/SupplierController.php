<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Supplier_company_detail;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::with('company')->get();
        //dd($suppliers);
        return view('supplier-management.supplier.index')->with(compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier-management.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->pincode = $request->pincode;
        $supplier->email = $request->email;
        $supplier->mobile = $request->phone;
        $supplier->nid = $request->nid;
        $supplier->trade_license = $request->trade_license;
        $supplier->save();
        $last_id = $supplier->id;
        if($request->company_name != null){
            $company = new Supplier_company_detail();
            $company->supplier_id = $last_id;
            $company->name = $request->company_name;
            $company->address = $request->company_address;
            $company->name = $request->company_name;
            $company->city = $request->company_city;
            $company->pincode = $request->company_pincode;
            $company->email = $request->company_email;
            $company->mobile = $request->company_phone;
            $company->website = $request->company_website;
            $company->save();
            return redirect(route('supplier.index'))->with('success','Supplier With Company Create Successfully');
        }
        else{
            return redirect(route('supplier.index'))->with('success','Supplier Create Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::with('company')->where('id',$id)->get()->first();
        //dd($supplier);
        return view('supplier-management.supplier.show')->with(compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::with('company')->where('id',$id)->get()->first();
        //dd($supplier);
        return view('supplier-management.supplier.edit')->with(compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $dupplicate_email = Supplier::where('email',$request->email)->get()->first();
        //dd($dupplicate_email);
        if($dupplicate_email != null){
            if($id != $dupplicate_email->id){
                //dd($dupplicate_email);
                return redirect()->back()->with('error','Email Already Exist');
            } 
        }
        $supplier = Supplier::with('company')->findorFail($id);
        //dd($supplier);
        //dd('d');
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->pincode = $request->pincode;
        $supplier->email = $request->email;
        $supplier->mobile = $request->phone;
        $supplier->nid = $request->nid;
        $supplier->trade_license = $request->trade_license;
        $supplier->update();
        //company
        if($supplier->company == null && $request->company_name != null){
            $company = new Supplier_company_detail();
            $company->supplier_id = $id;
            $company->name = $request->company_name;
            $company->address = $request->company_address;
            $company->name = $request->company_name;
            $company->city = $request->company_city;
            $company->pincode = $request->company_pincode;
            $company->email = $request->company_email;
            $company->mobile = $request->company_phone;
            $company->website = $request->company_website;
            $company->save();
            return redirect(route('supplier.index'))->with('success','Supplier Update With Company Create Successfully');
        }
        elseif($supplier->company != null && $request->company_name != null){
            $company = Supplier_company_detail::findorFail($supplier->company->id);
            $company->supplier_id = $id;
            $company->name = $request->company_name;
            $company->address = $request->company_address;
            $company->name = $request->company_name;
            $company->city = $request->company_city;
            $company->pincode = $request->company_pincode;
            $company->email = $request->company_email;
            $company->mobile = $request->company_phone;
            $company->website = $request->company_website;
            $company->update();
            return redirect(route('supplier.index'))->with('success','Supplier Update Successfully');
        }
        return redirect(route('supplier.index'))->with('success','Supplier Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::with('company')->findorFail($id)->delete();
        return redirect(route('supplier.index'))->with('success','Supplier Delete Successfully');
    }
    public function updateSupplierStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Supplier::where('id',$data['supplier_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'supplier_id'=> $data['supplier_id']]);
        }
    }
}
