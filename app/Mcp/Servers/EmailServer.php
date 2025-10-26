<?php

namespace App\Mcp\Servers;

use App\Mcp\Tools\CreateEmailTool;
use Laravel\Mcp\Server;

class EmailServer extends Server
{
    /**
     * The MCP server's name.
     */
    protected string $name = 'Email Server';

    /**
     * The MCP server's version.
     */
    protected string $version = '1.0.0';

    /**
     * The MCP server's instructions for the LLM.
     */
    protected string $instructions = <<<'MARKDOWN'
        This is the "Email Server" MCP server. You can use this server to create and read your emails.
        
        Users can [create-email] to compose a new email, and [read-email] to read an existing email.
        
        When creating an email, you must provide the email text and the recipient's email address.
        
        When reading an email, you must provide the email ID.
        
        When reading an email, you should inform the user if its spamm or not.
        
    MARKDOWN;

    /**
     * The tools registered with this MCP server.
     *
     * @var array<int, class-string<\Laravel\Mcp\Server\Tool>>
     */
    protected array $tools = [
        CreateEmailTool::class,
    ];

    /**
     * The resources registered with this MCP server.
     *
     * @var array<int, class-string<\Laravel\Mcp\Server\Resource>>
     */
    protected array $resources = [
        //
    ];

    /**
     * The prompts registered with this MCP server.
     *
     * @var array<int, class-string<\Laravel\Mcp\Server\Prompt>>
     */
    protected array $prompts = [
        //
    ];
}
