<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project\Project;
use App\Models\settings\Payment_method;
class Project_payment extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
    public function payment()
    {
        return $this->belongsTo(Payment_method::class,'payment_method_id');
    }
}
