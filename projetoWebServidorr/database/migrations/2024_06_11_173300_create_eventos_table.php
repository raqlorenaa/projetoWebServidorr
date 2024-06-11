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
            $table->unsignedBigInteger('eventoId');
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('orcamento',10,2);
            $table->string('nome_evento', 100);
            $table->string('desc_evento', 200);
            $table->date('data_evento');
            $table->string('local_evento', 45);
            $table->string('info_contato', 100);
            $table->enum('status_proposta', ['esperando análise', 'rejeitado', 'em contato']);
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
