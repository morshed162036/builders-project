<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Product;
class Estimation_machine extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class,'product_id')->select('id','title');
    }
}
