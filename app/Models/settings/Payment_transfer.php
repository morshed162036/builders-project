<?php

namespace App\Models\settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\settings\payment_method;
class Payment_transfer extends Model
{
    use HasFactory;

    public function paymentFromAccount(){
        return $this->belongsTo(payment_method::class,'from_id');
    }

    public function paymentToAccount(){
        return $this->belongsTo(payment_method::class,'to_id');
    }
}
