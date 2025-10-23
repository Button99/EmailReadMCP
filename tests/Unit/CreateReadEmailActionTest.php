<?php

use App\Actions\CreateReadEmailAction;

test('Creates emails', function () {
    $action = new CreateReadEmailAction;

    $email = $action->handle('This is a test email.', 'test@test123.com');

    expect($email->email_text)->toBe('This is a test email.')
        ->and($email->email_address)->toBe('test@test123.com');
});
