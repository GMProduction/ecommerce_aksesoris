<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $pesanan;
    public $status;
    public $title;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new SendEmail($this->title,$this->pesanan, $this->status);
        Mail::to($this->pesanan->getPelanggan->email)->send($email);

    }
}
