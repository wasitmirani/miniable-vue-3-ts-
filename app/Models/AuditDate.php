<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditDate extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $casts = [

        'audit_date' => 'datetime:Y-m-d',
    ];
}
