<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function($table) {
            $table->string('phone')->unique()->nullable()->after('email');
            $table->string('id_card_number')->unique()->nullable()->after('phone');
            $table->string('job_number')->unique()->nullable()->after('id_card_number');
            $table->timestamp('phone_verified_at')->nullable()->after('email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function($table) {
            $table->dropColumn('phone');
            $table->dropColumn('phone_verified_at');
        });
    }
};
