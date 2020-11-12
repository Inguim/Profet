<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->unique();
            $table->text('resumo');
            $table->text('introducao');
            $table->text('objetivo');
            $table->text('metodologia');
            $table->text('result_disc');
            $table->text('conclusao');

            $table->foreignId('categoria_id')->constrained('categorias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('estado_id')->constrained('estados')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
