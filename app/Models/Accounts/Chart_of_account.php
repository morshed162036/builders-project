<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounts\Accounts_group;

class Chart_of_account extends Model
{
    use HasFactory;

    public function accountGroup(){
        return $this->belongsTo(Accounts_group::class,'accounts_group_id')->select('id','name');
    }
}
