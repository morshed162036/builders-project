<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payroll\Benefit;
class Benefits_user extends Model
{
    use HasFactory;
    public function details()
    {
        return $this->belongsTo(Benefit::class,'benefit_id');
    }
}
