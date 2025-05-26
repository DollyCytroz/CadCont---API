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
        Schema::create('contato', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Nome');
            $table->number('idade'); 
            $table->varchar('telefone');
            $table->varchar('email'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contato');
    }
};
