<?php

namespace Database\Factories;

use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    protected $model = Email::class;

    public function definition(): array
    {
        return [
            'email_text' => $this->faker->paragraph(3),
            'email_address' => $this->faker->unique()->safeEmail(),
            'email_subject' => $this->faker->sentence(6, true),
        ];
    }
}
