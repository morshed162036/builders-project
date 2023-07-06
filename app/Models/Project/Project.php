<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project\Client;
class Project extends Model
{
    use HasFactory;
    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
}
