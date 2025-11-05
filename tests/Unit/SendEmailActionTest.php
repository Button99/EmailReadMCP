<?php

use App\Models\Email;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    Mail::fake();
});

test('Sends emails to all unsent records', function () {
    $emails = Email::factory(2)->create([
        'send_email' => false,
    ]);

    $action = new \App\Actions\SendEmailAction;
    $action->handle();

    Mail::assertQueued(\App\Mail\SendEmail::class, 2);

    Mail::assertQueued(\App\Mail\SendEmail::class, function ($mail) use ($emails) {
        return $mail->hasTo($emails[0]->email_address);
    });

    Mail::assertQueued(\App\Mail\SendEmail::class, function ($mail) use ($emails) {
        return $mail->hasTo($emails[1]->email_address);
    });

});
