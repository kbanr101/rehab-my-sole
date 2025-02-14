<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class PersonalizationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {

        $encodedId =  Crypt::encryptString($this->data['service_purchase_id']);
        return $this->subject('Personalization Request Received')
            ->view('emails.personalization')
            ->with(['data' => $this->data, 'checkoutUrl' => url('/checkout/' . $encodedId),]);
    }
}
