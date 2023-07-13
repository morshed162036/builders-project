<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice\Invoice;
use App\Models\Project\Project;
class Machine_stock_detail extends Model
{
    use HasFactory;
    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
