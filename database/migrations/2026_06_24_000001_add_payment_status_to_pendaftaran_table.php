<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            if (!Schema::hasColumn('pendaftaran', 'payment_status')) {
                $table->enum('payment_status', ['unpaid', 'paid', 'failed'])
                      ->default('unpaid')
                      ->after('bukti_pembayaran');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropColumn('payment_status');
        });
    }
};
