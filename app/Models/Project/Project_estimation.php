<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project\Project;
use App\Models\Project\Estimation_product;
use App\Models\Project\Estimation_machine;
use App\Models\Project\Estimation_employee;
use App\Models\Project\Estimation_laborer;
use App\Models\Project\Estimation_otherexpense;
class Project_estimation extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class,'project_id')->with('client');
    }
    public function product(){
        return $this->hasMany(Estimation_product::class,'estimation_id')->with('product','unit');
    }
    public function machine(){
        return $this->hasMany(Estimation_machine::class,'estimation_id')->with('product');
    }
    public function employee(){
        return $this->hasMany(Estimation_employee::class,'estimation_id')->with('designation');
    }
    public function laborer(){
        return $this->hasMany(Estimation_laborer::class,'estimation_id')->with('designation');
    }
    public function otherexpense(){
        return $this->hasMany(Estimation_otherexpense::class,'estimation_id');
    }
}
