<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock\Product_stock;
use App\Models\Stock\Machine_stock;
use App\Models\settings\Unit;
class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:stock.index'])->only(['index']);
        $this->middleware(['permission:stock.show'])->only(['show']);
        $this->middleware(['permission:stock.edit'])->only(['edit']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product_stock::with('product','unit')->get();
        $machines = Machine_stock::with('product','unit')->get();
        //dd($products);
        return view('inventory-management.stock.index')->with(compact('products','machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        
    }
    public function editStock(string $slug, string $id)
    {
        $product = '';
        $machine = '';
        //dd($machine);
        if($slug == 'product')
        {
            $product = Product_stock::with('product')->findorFail($id);
        }
        else{
            $machine = Machine_stock::with('product')->findorFail($id);
        }
        $units = Unit::select('id','unit')->get();
        return view('inventory-management.stock.edit')->with(compact('product','machine','units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->type == 'product')
        {
            $product_stock = Product_stock::findorFail($id);
            $product_stock->unit_id = $request->unit_id;
            $product_stock->unit_price = $request->unit_price;
            $product_stock->update();
            return redirect(route('stock.index'))->with('success','Product Stock Update Successfully!');
        }
        else
        {
            $machine_stock = Machine_stock::findorFail($id);
            $machine_stock->unit_id = $request->unit_id;
            $machine_stock->daily_hour = $request->daily_hour;
            $machine_stock->hourly_rent = $request->hourly_rent;
            $machine_stock->update();
            return redirect(route('stock.index'))->with('success','Machine Stock Update Successfully!');
        }
    }
    public function updateStock(Request $request,string $slug, string $id)
    {
        if($slug == 'product')
        {
            $product_stock = Product_stock::findorFail($id);
            $product_stock->unit_id = $request->unit_id;
            $product_stock->unit_price = $request->unit_price;
            $product_stock->update();
            return redirect(route('stock.index'))->with('success','Product Stock Update Successfully!');
        }
        else
        {
            $machine_stock = Machine_stock::findorFail($id);
            $machine_stock->unit_id = $request->unit_id;
            $machine_stock->daily_hour = $request->daily_hour;
            $machine_stock->hourly_rent = $request->hourly_rent;
            $machine_stock->update();
            return redirect(route('stock.index'))->with('success','Machine Stock Update Successfully!');
        }
    }

    public function showStock(string $slug, string $id)
    {
        if($slug == 'product')
        {
            $stockproduct = Product_stock::with('details')->where('id',$id)->get()->first();
            //dd($stockproduct);
            return view('inventory-management.stock.product_show')->with(compact('stockproduct'));
        }
        elseif ($slug == 'machine') {
            $stockmachine = Machine_stock::with('details')->where('id',$id)->get()->first();
            return view('inventory-management.stock.machine_show')->with(compact('stockmachine'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
