<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeeklyCompaniesUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $companies;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($companies)
    {
        //
        $this->companies = $companies;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Since company was defined as a public property, it
        // can be used from the view
        return 
        $this->from(env('MAILGUN_EMAIL'))
        ->view('email.weeklyCompaniesUpdate');
    }
}
