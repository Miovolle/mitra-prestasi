<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name'              => 'Admin Mitra Prestasi',
            'email'             => 'admin@mitraprestasi.com',
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('admin123'),
            'role'              => 'admin',
            'remember_token'    => Str::random(10),
        ];
    }
}
