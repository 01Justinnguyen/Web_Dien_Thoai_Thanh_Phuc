<?php

namespace App\Jobs;

use App\Mail\registerMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mailTo;
    public $dataMail;


    public function __construct($mailTo, $dataMail)
    {
        $this->mailTo   = $mailTo;
        $this->dataMail = $dataMail;
    }


    public function handle()
    {
        Mail::to($this->mailTo)->send(new registerMail($this->dataMail));
    }
}
