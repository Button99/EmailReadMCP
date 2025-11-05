<?php

namespace App\Actions;

use App\Mail\SendEmail;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;

final readonly class SendEmailAction
{
    public function handle(): void
    {
        $emails = Email::where('send_email', false)->get();
        foreach ($emails as $email) {
            $mail = new SendEmail($email->email_subject, $email->email_text);
            Mail::to($email->email_address)->queue($mail);
            $email->send_email = true;
            $email->save();
        }
    }
}
