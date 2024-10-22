<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{

    protected static ?string $password = '$2y$12$PZPAExws6d8iPrGOGX7gdeGYDTMQ61Frhw0XCeeAYLyIcHqHjRYLi'; // 1 => 8

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'logo' => null,
            'bio' => Str::random(10),
            'about' => Str::random(100),
            'location' => fake()->city(),
            'website' => fake()->url(),
        ];
    }
}
