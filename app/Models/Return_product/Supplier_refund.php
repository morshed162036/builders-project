<?php

namespace App\Models\Return_product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Supplier;
use App\Models\settings\Payment_method;
class Supplier_refund extends Model
{
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment_method::class,'payment_method_id');
    }
}
