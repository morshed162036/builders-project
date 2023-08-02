<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project\Project;
use App\Models\Project\Team_member;
class Team extends Model
{
    use HasFactory;
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    public function team_member()
    {
        return $this->hasMany(Team_member::class,'team_id')->with('employee');
    }
}
