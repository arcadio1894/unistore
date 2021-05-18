<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailContactMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $attribute;

    public function __construct($attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mailContact')->subject('Mensaje de prueba unistore trabajo dos');
    }
}
