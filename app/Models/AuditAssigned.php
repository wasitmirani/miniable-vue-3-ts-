<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditAssigned extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function auditdate()
    {
        return $this->belongsTo(AuditDate::class, 'audit_date_id', 'id')->orderBy('audit_date','asc');
    }
    public function auditor()
    {
        return $this->belongsTo(Auditor::class, 'auditor_id', 'id')->with('auditrequests');
    }
}
