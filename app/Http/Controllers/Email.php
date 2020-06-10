<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestEmail;
use Mail;


class Email extends Controller
{
    /**
     * Sends an Email to the new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function enviarcorreo(){

        $data = ['message' => 'Gracias por registrarte en AmzBooks, para verificar tu cuenta haga click en el siguiente enlace'];
        /* for ($i=0; $i < 20; $i++) {
        } */
        Mail::to('swordblack8@gmail.com')->send(new TestEmail($data));


    }
}
