<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::get();
        return view('brand.index')->with(compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
        $this->validate($request,$rules);

        $brand = new Brand();
        $brand->name = $request->brand_name;
        $brand->description = $request->brand_description;
        $brand->address = $request->brand_address;
        
        //dd($request->file('brand_image'));
        //dd($request->hasFile('brand_image'));
        if($request->hasFile('brand_image')){
            $image_temp = $request->file('brand_image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/brand_logo/'.$imageName;
                Image::make($image_temp)->save($imagePath);
                $brand->image = $imageName;
            }
        }

        
        $brand->save();
        return redirect(route('brand.index'))->with('success','New Brand Save Successfully!');
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
        $brand = Brand::where('id',$id)->get()->first();
        //dd($brand->id);
        return view('brand.edit')->with(compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
        $this->validate($request,$rules);
        $brand = Brand::findorFail($id);
        $brand->name = $request->brand_name;
        $brand->description = $request->brand_description;
        $brand->address = $request->brand_address;

        if($request->hasFile('brand_image')){
            $exists = 'images/brand_logo/'.$brand->image;
            if(File::exists($exists))
            {
                File::delete($exists);
            }
            $image_temp = $request->file('brand_image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/brand_logo/'.$imageName;
                Image::make($image_temp)->save($imagePath);
                $brand->image = $imageName;
            }
        }

        $brand->update();

        return redirect(route('brand.index'))->with('success','Brand Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findorFail($id);
        $exists = 'images/brand_logo/'.$brand->image;
        if(File::exists($exists))
        {
            File::delete($exists);
        }
        $brand->delete();
        $message  = "Brand Delete Successfully Done";
        return redirect(route('brand.index'))->with("success",$message);
    }

    public function updateBrandStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'brand_id'=> $data['brand_id']]);
        }
    }

}
