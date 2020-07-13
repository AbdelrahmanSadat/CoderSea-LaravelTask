<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCompany extends Mailable
{
    use Queueable, SerializesModels;

    public $testValue;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($testValue)
    {
        //
        $this->testValue = $testValue;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return
            $this->from(env('MAILGUN_EMAIL'))
            ->view('emailTemplate');
    }
}
