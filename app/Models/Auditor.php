<?php

namespace App\Models;

use App\Models\AuditDateRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auditor extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];
    public function auditrequests()
   {
       return $this->hasMany(AuditDateRequest::class, 'auditor_id', 'id')->with('auditdate');
   }
}
