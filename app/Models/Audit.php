<?php

namespace App\Models;

use App\Models\AuditDate;
use App\Models\AuditStatus;
use App\Models\AuditAuditor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Audit extends Model
{
    use HasFactory;

    protected $guarded=[];

    /**
     * Get all of the comments for the Audit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auditdates()
    {
        return $this->hasMany(AuditDate::class, 'audit_id', 'id');
    }
    public function auditors()
    {
        return $this->hasMany(AuditAuditor::class, 'audit_id', 'id');
    }
    /**
     * Get the user that owns the Audit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(AuditStatus::class, 'status_id', 'id');
    }
}