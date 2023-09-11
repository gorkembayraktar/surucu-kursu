<?php

namespace App\Helpers;

use App\Models\Email;

use Illuminate\Support\Facades\Config;

class EmailsHelper
{
    
    public static function setMailConfig(){

        $mail = Email::where('type', \App\Enum\EmailEnum::REPLY_CONTACTS)->first();
        if($mail):
            $config = array(
                'driver'   => 'smtp',
                'transport' => 'smtp',
                'host'       => $mail->host,
                'port'       => $mail->port,
                'encryption' => $mail->secure,
                'username'   => $mail->email,
                'password'   => $mail->password,
                //'sendmail'   => '/usr/sbin/sendmail -bs',
                'pretend'    => false,
                'from'       => array('address' => $mail->email, 'name' => \App\Models\Settings::where('key', 'title')->first()->value),
                
            );
            Config::set('mail.mailers.smtp', $config);

            //dd(Config::get('mail'));
        
        endif;

    }
}