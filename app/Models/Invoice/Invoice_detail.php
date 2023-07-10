<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\settings\Unit;
use App\Models\Product;
class Invoice_detail extends Model
{
    use HasFactory;

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id')->select('id','unit');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id')->select('id','title');
    }
}
