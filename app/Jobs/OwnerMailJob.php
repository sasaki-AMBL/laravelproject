<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\OwnerMail;
use Illuminate\Support\Facades\Mail;


class OwnerMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $owner_email;
    public $product_name;
    public $amount;

    public function __construct($owner_email,$product_name,$amount)
    {
        //
        $this->owner_email=$owner_email;
        $this->product_name=$product_name;
        $this->amount=$amount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to($this->owner_email)->send(new OwnerMail($this->product_name,$this->amount));

    }
}
