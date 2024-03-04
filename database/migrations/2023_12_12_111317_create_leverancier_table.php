<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leverancier', function (Blueprint $table) {
            $table->id();
            $table->string('naam', 250);
            $table->string('contactPersoon', 250);
            $table->string('leverancierNummer', 250);
            $table->string('mobiel', 11);
            $table->boolean('isActief')->default(1);
            $table->string('opmerkingen', 250)->nullable();
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leverancier');
    }
};
