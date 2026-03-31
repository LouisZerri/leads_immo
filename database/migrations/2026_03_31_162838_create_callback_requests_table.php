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
        Schema::create('callback_requests', function (Blueprint $table) {
            $table->id();
            $table->string('page_source'); // P1, P2
            $table->string('contact'); // email ou téléphone
            $table->string('statut')->default('nouveau'); // nouveau, traite
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();

            $table->index('statut');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('callback_requests');
    }
};
