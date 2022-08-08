<?php

namespace App\Jobs;

use Illuminate\Support\Arr;
use Illuminate\Bus\Queueable;
use App\Mail\auditNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendAuditEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $auditor;
    protected $data,$audit_date_requests,$audit_dates;
    public function __construct($auditor,$data,$audit_date_requests=null,  $audit_dates=null)
    {
        $this->auditor = $auditor;
        $this->data = $data;
        $this->audit_date_requests=$audit_date_requests;
        $this->audit_dates=  $audit_dates;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        Mail::to($this->auditor['email'])->send(new auditNotification($this->data,$this->auditor,$this->audit_date_requests,$this->audit_dates));
    }
}
