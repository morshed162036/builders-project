<?php

namespace App\Models\settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\settings\payment_transfer;

class Payment_method extends Model
{
    use HasFactory;

    public function form_transfer(){
        $this->hasMany(payment_transfer::class,'form_id');
    }
    public function to_transfer(){
        $this->hasMany(payment_transfer::class,'to_id');
    }
}
