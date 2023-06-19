<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('product.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Catalogue::with('category')->get()->toArray();
        $brands = Brand::where('status','Active')->get()->toArray();
        return view('product.create')->with(compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'category_id' =>'required',
            'brand_id' =>'required',
            'product_code' =>'required',
            'type' =>'required',
        ];
        $this->validate($request,$rules);
        $categoryDetails = Category::find($request->category_id);
        $product = new Product();
        $product->catalogue_id = $categoryDetails['catalogue_id'];
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->brand_id = $request->brand_id;
        $product->product_code = $request->product_code;
        $product->type = $request->type;
        $product->description = $request->description;

        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/product_image/'.$imageName;
                Image::make($image_temp)->save($imagePath);
                $product->image = $imageName;
            }
        }

        $product->save();
        return redirect(route('product.index'))->with('success','Product Create Successfully!');
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
        $product = Product::findorFail($id);
        $categories = Catalogue::with('category')->get()->toArray();
        $brands = Brand::where('status','Active')->get()->toArray();
        return view('product.edit')->with(compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'required',
            'category_id' =>'required',
            'brand_id' =>'required',
            'product_code' =>'required',
            'type' =>'required',
        ];
        $this->validate($request,$rules);
        $categoryDetails = Category::find($request->category_id);
        $product = Product::where('id',$id);
        $product->catalogue_id = $categoryDetails['catalogue_id'];
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->brand_id = $request->brand_id;
        $product->product_code = $request->product_code;
        $product->type = $request->type;
        $product->description = $request->description;

        if($request->hasFile('image')){
            $exists = 'images/product_image/'.$product->image;
            if(File::exists($exists))
            {
                File::delete($exists);
            }
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/product_image/'.$imageName;
                Image::make($image_temp)->save($imagePath);
                $product->image = $imageName;
            }
        }

        $product->update();
        return redirect(route('product.index'))->with('success','Product Create Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorFail($id);
        $exists = 'images/product_image/'.$product->image;
        if(File::exists($exists))
        {
            File::delete($exists);
        }
        $product->delete();
        return redirect(route('product.index'))->with('success','Product Delete Successfully!');
    }

    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Product::where('id',$data['method_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'method_id'=> $data['method_id']]);
        }
    }
}
