<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project\Client;
use App\Models\Project\Team;
class Project extends Model
{
    use HasFactory;
    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
    public function team(){
        return $this->hasOne(Team::class,'project_id');
    }
}
