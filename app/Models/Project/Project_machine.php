<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project\Project;
use App\Models\Stock\Machine_stock;
class Project_machine extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
    public function stock()
    {
        return $this->belongsTo(Machine_stock::class,'stock_machine_id')->with('product');
    }
}
