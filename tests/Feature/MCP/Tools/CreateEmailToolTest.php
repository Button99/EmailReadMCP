<?php

use App\Mcp\Servers\EmailServer;
use App\Mcp\Tools\CreateEmailTool;

test('Validates the email_text', function () {
    $response = EmailServer::tool(CreateEmailTool::class);

    $response->assertHasErrors([
        'The email text field is required.',
    ]);
});

test('Validates the email argument', function () {
    $response = EmailServer::tool(CreateEmailTool::class, [
        'email_text' => 'blah blah',
    ]);

    $response->assertHasErrors([
        'The email address field is required.',
    ]);
});

test('Creates an email', function () {
    $response = EmailServer::tool(CreateEmailTool::class, [
        'email_text' => 'This is a test email.',
        'email_address' => 'test@test.com',
    ]);

    $response->assertOk()
        ->assertSee('Email created successfully.');
});
