<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioProjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_projs', function (Blueprint $table) {
            $table->id();
            $table->enum('relacao', ['coordenador', 'coorientador', 'orientador', 'bolsista', 'voluntario']);

            $table->foreignId('user_id')->unsigned()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('projeto_id')->unsigned()->constrained('projetos')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('usuario_projs');
    }
}
