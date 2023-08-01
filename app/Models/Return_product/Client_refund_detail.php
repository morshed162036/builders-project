<?php

namespace App\Models\Return_product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Return_product\Client_refund;
class Client_refund_detail extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');    
    }

    public function client_refund()
    {
        return $this->belongsTo(Client_refund::class,'client_refund_id');
    }
}
