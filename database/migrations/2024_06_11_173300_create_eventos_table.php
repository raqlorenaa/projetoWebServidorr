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
        Schema::create('Eventos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id');
            $table->decimal('orcamento', 8, 2);
            $table->string('nome_evento');
            $table->text('desc_evento');
            $table->date('data_evento');
            $table->string('local_evento');
            $table->string('info_contato');
            $table->string('status_proposta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Eventos');
    }
};
