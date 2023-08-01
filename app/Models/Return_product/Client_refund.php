<?php

namespace App\Models\Return_product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project\Client;
use App\Models\settings\Payment_method;
class Client_refund extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment_method::class,'payment_method_id');
    }
}
