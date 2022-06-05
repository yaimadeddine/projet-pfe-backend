<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiel', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('matricule');
            $table->double('prix');
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade');
            $table->bigInteger('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
            $table->bigInteger('contrat_id')->unsigned()->nullable();
            $table->foreign('contrat_id')->references('id')->on('contrat')->onDelete('cascade');
            $table->bigInteger('marque_id')->unsigned()->nullable();
            $table->foreign('marque_id')->references('id')->on('marque')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiel');
    }
};
