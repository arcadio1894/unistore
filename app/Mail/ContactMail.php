<?php
/**
 * Created by PhpStorm.
 * User: asistemas
 * Date: 20/05/2021
 * Time: 15:35
 */

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.contactMail');
    }
}
