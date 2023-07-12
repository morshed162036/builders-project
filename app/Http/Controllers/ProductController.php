<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Image;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Brand;

use App\Models\Stock\Product_stock;
use App\Models\Stock\Machine_stock;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['catalogue'=>function($q){
            $q->select('id','name');
        },'category'=>function($q){
            $q->select('id','name');
        },'brand'=>function($q){
            $q->select('id','name');
        }])->get();
        //dd($products);
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
        $last = $product->id;
        if($request->type == 'Product')
        {
            $product_stock = new Product_stock();
            $product_stock->product_id = $last;
            $product_stock->save();
        }
        else{
            $machine_stock = new Machine_stock();
            $machine_stock->product_id = $last;
            $machine_stock->save();
        }

        
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
        //dd($product);
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
        $product = Product::where('id',$id)->get()->first();
        //dd($product->get());
        if($request->hasFile('image')){
            $exists = 'images/product_image/'. $product['image'];
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
        $product->catalogue_id = $categoryDetails['catalogue_id'];
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->brand_id = $request->brand_id;
        $product->product_code = $request->product_code;
        $product->type = $request->type;
        $product->description = $request->description;

        
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
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=> $data['product_id']]);
        }
    }
}
