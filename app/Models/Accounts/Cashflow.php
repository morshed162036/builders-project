<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\settings\Payment_method;
class Cashflow extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->belongsTo(Payment_method::class,'payment_method_id');
    }
}
