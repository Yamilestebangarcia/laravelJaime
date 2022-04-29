<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "login contraseña";
    public $jwt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.login');
    }
}
