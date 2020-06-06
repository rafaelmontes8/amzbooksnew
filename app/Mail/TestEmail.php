<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'hola@rafaelmontesweb.es';
        $subject = 'Registro con éxito';
        $name = 'AmzBooks';

        return $this->view('emails.test')
                    ->from($address, $name)
                    ->subject($subject)
                    ->with([ 'test_message' => $this->data['message'], 'user' => $this->data['name'] ]);

    }
}
