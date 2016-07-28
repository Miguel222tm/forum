<?php

namespace App\Libs;

use Illuminate\Support\ServiceProvider;
use Mailgun\Mailgun;

class MailgunHandler extends Mailgun
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function sendMail($to, $subject, $message) {

      $mg = new Mailgun(env('MAILGUN_SECRET'));
      $domain = env('MAILGUN_DOMAIN');

      $mg->sendMessage($domain, array(
        'from'    => env('MAIL_FROM'),
        'to'      => $to,
        'subject' => $subject,
        'text'    => $message
      ));

    }
}
