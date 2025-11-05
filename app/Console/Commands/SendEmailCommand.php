<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Let the emails fly';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $action = new \App\Actions\SendEmailAction;
        $action->handle();
    }
}
