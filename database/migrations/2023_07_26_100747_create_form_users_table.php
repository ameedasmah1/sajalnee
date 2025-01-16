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
        Schema::create('form_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->nullable()->constrained()->cascadeOnDelete()->on('forms');
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete()->on('users');
            $table->char('rules',1)->default(0);
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_users');
    }
};
