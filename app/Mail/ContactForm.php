<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject_form;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$subject_form,$message)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->subject_form = $subject_form;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('ContactForm')
        ->subject(trans('global.mailtitle'))
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject_form,
            'message' => $this->message,
        ]);
    }
}
