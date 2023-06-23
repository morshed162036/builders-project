<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Catalogue;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with(['catalogue','parentcategory'])->get()->toArray();
        return view('category.index')->with(compact('categories')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catalogues = Catalogue::get()->all();
        $category = new Category();
        $getCategories = array();
        
        return view('category.create')->with(compact('catalogues','category','getCategories'));
    }
    public function appendCategoryLevel(Request $request){
        //dd($request->all());
        if($request->ajax()){
            $data = $request->all();
            //dd($data);
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'catalogue_id'=>$data['catalogue_id']])->get()->toArray();
            //dd($getCategories);

            return view('category.append_categories_level')->with(compact('getCategories'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $category = new Category();
        if($request->category_discount == ''){
            $category_discount = 0;
        }
        else{
            $category_discount = $request->category_discount;
        }
        $category->name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->catalogue_id = $request->catalogue_id;
        $category->discount = $category_discount;
        $category->description = $request->category_description;
        $category->save();
        $categories = Category::with(['catalogue','parentcategory'])->get()->toArray();
        return redirect(route('category.index'))->with('success','Category Create Successfully!');

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
        $category = Category::findorFail($id);
        $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'catalogue_id'=>$category['catalogue_id']])->get()->toArray();
        $catalogues = Catalogue::get()->all();

        return view('category.edit')->with(compact('category','getCategories','catalogues'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findorFail($id);
        if($request->category_discount == ''){
            $category_discount = 0;
        }
        else{
            $category_discount = $request->category_discount;
        }
        $category->name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->catalogue_id = $request->catalogue_id;
        $category->discount = $category_discount;
        $category->description = $request->category_description;
        $category->update();
        $categories = Category::with(['catalogue','parentcategory'])->get()->toArray();
        return redirect(route('category.index'))->with('success','Category Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findorFail($id)->delete();
        
        return redirect()->back()->with('success','Category Delete Successfully!');
    }
    public function updateCategoryStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=> $data['category_id']]);
        }
    }
}
