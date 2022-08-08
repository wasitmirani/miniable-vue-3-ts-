<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class auditNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data,$auditor,$audit_date_requests,$audit_dates;
    public function __construct($data,$auditor,$audit_date_requests=null,$audit_dates=null)
    {
        $this->data=$data;
        $this->auditor=$auditor;
        $this->audit_date_requests=$audit_date_requests;
        $this->audit_dates=$audit_dates;       //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.auditMail',['data'=>$this->data,'auditor'=>$this->auditor,'audit_date_requests'=>$this->audit_date_requests,'audit_dates'=>$this->audit_dates]);
    }
}
