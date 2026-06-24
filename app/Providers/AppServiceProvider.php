<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Pluralizer;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Pluralizer::useLanguage('english');

        // Daftarkan irregular plural secara eksplisit
        Pluralizer::irregular('peserta', 'peserta');
        Pluralizer::irregular('lomba', 'lomba');
    }
}