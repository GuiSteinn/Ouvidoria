<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ouvidorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('tipo', ['elogio', 'reclamação', 'sugestão', 'denúncia']);
            $table->string('titulo');
            $table->text('mensagem');
            $table->enum('status', ['aberta', 'em análise', 'respondida', 'fechada'])->default('aberta');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ouvidorias');
    }
};
