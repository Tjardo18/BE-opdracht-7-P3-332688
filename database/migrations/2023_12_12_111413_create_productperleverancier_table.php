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
        Schema::create('productperleverancier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leverancierId')->constrained('leverancier');
            $table->foreignId('productId')->constrained('product');
            $table->date('datumLevering');
            $table->integer('aantal');
            $table->date('datumEerstvolgendeLevering')->nullable();
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
        Schema::dropIfExists('productperleverancier');
    }
};
