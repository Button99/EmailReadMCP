<?php

test('to array', function () {
    $email = \App\Models\Email::factory()->create();

    expect($email->toArray())->toBeArray();
});
