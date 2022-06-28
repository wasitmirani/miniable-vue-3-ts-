<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditAuditor extends Model
{
    use HasFactory;
    protected $guarded=[];

   /**
    * Get the user that owns the AuditAuditor
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function auditor()
   {
       return $this->belongsTo(Auditor::class, 'auditor_id', 'id');
   }
}
