<?php

test('to array', function () {
    $email = \App\Models\Email::factory()->create();

    expect(array_keys($email->toArray()))
        ->toBe([
            'email_text',
            'email_address',
            'updated_at',
            'created_at',
            'id',
        ]);
});
