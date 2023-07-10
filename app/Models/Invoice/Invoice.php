<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice\Invoice_detail;
use App\Models\Project\Project;
use App\Models\Project\Client;
use App\Models\Supplier;
class Invoice extends Model
{
    use HasFactory;

    Public Function details(){
        return $this->hasMany(Invoice_detail::class,'invoice_id')->with('unit','product');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id')->with('company');
    }
    public function client(){
        return $this->belongsTo(Client::class,'client_id')->select('id','name','company');
    }
    public function project(){
        return $this->belongsTo(Project::class,'project_id')->with('client');
    }
}
