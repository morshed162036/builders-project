<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project\Team;
class Team_member extends Model
{
    use HasFactory;
    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }
    public function employee()
    {
        return $this->belongsTo(User::class,'user_id')->with('designation');
    }
}
