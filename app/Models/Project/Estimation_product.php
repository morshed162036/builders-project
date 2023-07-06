<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\settings\Unit;
Use App\Models\Product;
class Estimation_product extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class,'product_id')->select('id','title');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id')->select('id','unit');
    }
}
