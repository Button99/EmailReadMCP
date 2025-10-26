<?php

use App\Mcp\Servers\EmailServer;
use App\Mcp\Tools\ReadEmailTool;

test('Reads emails', function () {
    $response = EmailServer::tool(ReadEmailTool::class);

    $response->assertOk()
        ->assertSee('Here is a list of the latest the emails:');
});
