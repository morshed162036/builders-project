<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Designation;
class Estimation_employee extends Model
{
    use HasFactory; 

    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id')->select('id','title');
    }
}
