<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pesanan;
    public $status;
    public $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$pesanan, $status)
    {
        //
        $this->pesanan = $pesanan;
        $this->status = $status;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details = [
            'title' => $this->title,
            'data'  => $this->pesanan,
            'status' => $this->pesanan
        ];

        return $this->view('email.email')->with($details)->from('noreply@domain.com','Kaka')->subject('test email');
    }
}
