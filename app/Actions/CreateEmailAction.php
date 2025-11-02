<?php

namespace App\Actions;

use App\Models\Email;

final readonly class CreateEmailAction
{
    public function handle(string $emailSubject, string $emailText, string $email): Email
    {
        return Email::query()->create([
            'email_subject' => $emailSubject,
            'email_text' => $emailText,
            'email_address' => $email,
        ]);
    }
}
