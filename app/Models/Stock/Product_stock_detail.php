<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice\Invoice;
class Product_stock_detail extends Model
{
    use HasFactory;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }
}
