<?php

namespace App\Models;

use Database\Factories\EmailFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /** @use  HasFactory<EmailFactory>*/
    use HasFactory;

    protected $fillable = [
        'email_text',
        'email_address',
    ];
}
