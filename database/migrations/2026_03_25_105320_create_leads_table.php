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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('page_source'); // P1, P2, P3, P4
            $table->string('code_postal', 5)->nullable();
            $table->string('type_logement')->nullable(); // P1, P2
            $table->string('budget_investissement')->nullable(); // P3, P4
            $table->string('prenom');
            $table->string('telephone', 20);
            $table->string('email');
            $table->boolean('consentement_rgpd')->default(false);
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_term')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('statut')->default('nouveau'); // nouveau, contacte, converti, perdu
            $table->timestamps();

            $table->index('page_source');
            $table->index('statut');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
