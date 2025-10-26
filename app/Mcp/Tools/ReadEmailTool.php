<?php

namespace App\Mcp\Tools;

use App\Actions\ReadEmailAction;
use App\Models\Email;
use Illuminate\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class ReadEmailTool extends Tool
{
    /**
     * The tool's description.
     */
    protected string $description = <<<'MARKDOWN'
        Use this tool to read an existing email stored in the database. Provide the email text and the email address of the user, and it was created.
        
        Default number is 5 emails.
    MARKDOWN;

    /**
     * Handle the tool request.
     */
    public function handle(Request $request, ReadEmailAction $action): Response
    {
        $emails = $action->handle()->take(5);

        if ($emails->isEmpty()) {
            return Response::text('Here is a list of the latest the emails: No emails have been created yet.');
        }

        $formattedEmails = $emails->map(fn (Email $email): string => sprintf(
            'Email text: %s, Email address: %s, Created at: %s',
            $email->email_text,
            $email->email_address,
            $email->created_at->toDateTimeString()
        ))->join(PHP_EOL);

        return Response::text("Here is a list of the latest the emails:\n{$formattedEmails}");
    }

    /**
     * Get the tool's input schema.
     *
     * @return array<string, \Illuminate\JsonSchema\JsonSchema>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            //
        ];
    }
}
