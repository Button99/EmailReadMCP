<?php

namespace App\Mcp\Tools;

use App\Actions\CreateEmailAction;
use Illuminate\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class CreateEmailTool extends Tool
{
    /**
     * The tool's description.
     */
    protected string $description = <<<'MARKDOWN'
        Use this tool to create a new email. Provide the email description and the recipient's email address.
    MARKDOWN;

    /**
     * Handle the tool request.
     */
    public function handle(Request $request, CreateEmailAction $action): Response
    {
        $request->validate([
            'email_text' => 'required|string|min:1|max:300',
            'email_address' => 'required|string|min:5|max:150',
        ]);

        $email = $action->handle(
            $request->string('email_text')->value(),
            $request->string('email_address')->value()
        );

        return Response::text(<<<'MARKDOWN'
            Email created successfully.

            MARKDOWN);
    }

    /**
     * Get the tool's input schema.
     *
     * @return array<string, \Illuminate\JsonSchema\JsonSchema>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'email_text' => $schema->string()->min(1)
                ->max(300)
                ->description(<<<'MARKDOWN'
                    A small description of the email to be created. This should include the main points to be covered in the email.
                    
                    Dont use "Assistant" or "Claude", or "GPT", or "AI", or "Bot"
                    MARKDOWN
                ),
            'email_address' => $schema->string()->min(5)
                ->max(150)
                ->description(<<<'MARKDOWN'
                        The recipient's email address.
                        
                        Dont use "Assistant" or "Claude", or "GPT", or "AI", or "Bot"
                        MARKDOWN
                ),
        ];
    }
}
