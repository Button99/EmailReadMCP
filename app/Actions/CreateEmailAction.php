<?php

namespace App\Actions;

use App\Models\Email;

final readonly class CreateEmailAction
{
    public function handle(string $emailText, string $email): Email
    {
        return Email::create([
            'email_text' => $emailText,
            'email_address' => $email,
        ]);
    }
}
