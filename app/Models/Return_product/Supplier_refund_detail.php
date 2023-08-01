<?php

namespace App\Models\Return_product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Return_product\Client_refund_detail;
class Supplier_refund_detail extends Model
{
    use HasFactory;

    public function client_refund()
    {
        return $this->belongsTo(Client_refund_detail::class,'client_refund_id')->with('product');
    }
}
