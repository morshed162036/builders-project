<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\settings\payment_method;
class Invoice_payment extends Model
{
    use HasFactory;

    public function payment_method()
    {
        return $this->belongsTo(Payment_method::class,'payment_method_id');
    }
}
