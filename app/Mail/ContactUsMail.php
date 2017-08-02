<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messages;
    public function __construct($name,$email,$message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messages = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email,$this->name)->view('emails.contact')->with('message',$this->messages);
    }
}
