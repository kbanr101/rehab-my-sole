<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function build()
    {
        return $this->subject('New Enquiry Received')
            ->view('emails.contact-created');
    }
}
