<?php

namespace App\Models;

use App\Models\Auditor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditDate extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $casts = [

        'audit_date' => 'datetime:Y-m-d',
    ];

    public function auditor()
    {
        return $this->belongsTo(Auditor::class, 'auditor_assistant', 'id');
    }
}
