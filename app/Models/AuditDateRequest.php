<?php

namespace App\Models;

use App\Models\AuditDate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditDateRequest extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function auditor()
    {
        return $this->belongsTo(Auditor::class, 'auditor_id', 'id');
    }
    public function auditdate()
    {
        return $this->belongsTo(AuditDate::class, 'audit_date_id', 'id')->orderBy('audit_date','asc');
    }
}
