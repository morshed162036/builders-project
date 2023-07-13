<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Stock\Product_stock_detail;
use App\Models\settings\Unit;
class Product_stock extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id')->select('id','title');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id')->select('id','unit');
    }
    public function details()
    {
        return $this->hasMany(Product_stock_detail::class,'product_stock_id')->with('invoice');
    }
}
