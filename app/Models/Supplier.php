<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier_company_detail;

class Supplier extends Model
{
    use HasFactory;

    public function company(){
        return $this->hasOne(Supplier_company_detail::class,'supplier_id');
    }
}
