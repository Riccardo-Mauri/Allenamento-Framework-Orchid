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
        Schema::table('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->required();
            $table->string('cognome', 30)->required();
            $table->string('telefono', 13)->required();
            $table->string('email', 255)->unique()->required();
            $table->foreignId('agency_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            Schema::dropIfExists('employees');
        });
    }
};
