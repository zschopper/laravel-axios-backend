<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('hu_HU')->name(),
            'email' => fake('hu_HU')->unique()->safeEmail(),
            'email_verified_at' => now(),
            'gender' => fake('hu_HU')->randomElement(\App\Models\User::GENDERS),
            'dob' => fake('hu_HU')->dateTimeBetween('1975-08-11', '2005-02-18'),
            'country' => fake('hu_HU')->country(),
            'city' => fake('hu_HU')->city(),
            'address1' => fake('hu_HU')->address(),
            'address2' => fake('hu_HU')->address(),
            'postcode' => fake('hu_HU')->postcode(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
