<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KreiranaDostava extends Mailable
{
    use Queueable, SerializesModels;

    public $dostava;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dostava)
    {
        $this->dostava = $dostava;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nova dostava')
            ->view('emails.nova_dostava');
    }
}
