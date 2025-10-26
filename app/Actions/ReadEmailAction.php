<?php

namespace App\Actions;

use App\Models\Email;
use Illuminate\Database\Eloquent\Collection;

final readonly class ReadEmailAction
{
    /*
     * Return all the emails.
     */
    /**
     * @return Collection<int, Email>
     */
    public function handle(): Collection
    {
        return Email::query()
            ->select(['id', 'email_text', 'email_address', 'created_at'])
            ->latest('created_at')
            ->limit(5)
            ->get();
    }
}
