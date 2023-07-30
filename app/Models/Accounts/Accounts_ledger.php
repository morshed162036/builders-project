<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounts\Accounts_ledger;
use App\Models\settings\Payment_method;

class Accounts_ledger extends Model
{
    use HasFactory;
    protected $table = "accounts_ledgers";

    public function account()
    {
        return $this->belongsTo(Chart_of_account::class,'chart_of_account_id');
    }
    public function payment()
    {
        return $this->belongsTo(Payment_method::class,'payment_method_id');
    }
}
