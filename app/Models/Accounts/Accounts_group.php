<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounts\Chart_of_account;

class Accounts_group extends Model
{
    use HasFactory;

    public function chartofAccount(){
        return $this->hasMany(Chart_of_account::class,'accounts_group_id');
    }
}
