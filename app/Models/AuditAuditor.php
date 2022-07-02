<?php

namespace App\Models;

use App\Models\AuditDateRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
       return $this->belongsTo(Auditor::class, 'auditor_id', 'id')->with('auditrequests');
   }

}
