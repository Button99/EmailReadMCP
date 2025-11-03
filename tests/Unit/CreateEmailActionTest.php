<?php

use App\Actions\CreateEmailAction;

test('Creates emails', function () {
    $action = new CreateEmailAction;

    $email = $action->handle('This is a test email.', 'Test', 'test@test123.com');

    expect($email->email_subject)->toBe('This is a test email.')
        ->and($email->email_text)->toBe('Test')
        ->and($email->email_address)->toBe('test@test123.com');
});
