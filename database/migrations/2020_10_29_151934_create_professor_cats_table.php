<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_cats', function (Blueprint $table) {
            $table->id();

            $table->foreignId('professor_id')->unsigned()->constrained('professors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('categoria_id')->unsigned()->constrained('categorias')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('professor_cats');
    }
}
