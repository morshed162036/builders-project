<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Salary extends Model
{
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(User::class,'user_id')->with('info','designation');
    }
}
