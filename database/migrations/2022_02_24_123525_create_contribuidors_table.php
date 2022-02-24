<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContribuidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribuidors', function (Blueprint $table) {
            $table->id();
            $table->string('github_username')->nullable();

            $table->foreignId('tipo_contribuicao_id')->unsigned()->constrained('tipo_contribuicaos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->unsigned()->constrained('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('contribuidors');
    }
}
