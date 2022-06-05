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
        Schema::create('fourniture', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('matricule');
            $table->double('prix');
            $table->bigInteger('marque_id')->unsigned()->nullable();
            $table->foreign('marque_id')->references('id')->on('marque')->onDelete('cascade');
            $table->bigInteger('materiel_id')->unsigned()->nullable();
            $table->foreign('materiel_id')->references('id')->on('materiel')->onDelete('cascade');
            $table->bigInteger('type_fourniture_id')->unsigned()->nullable();
            $table->foreign('type_fourniture_id')->references('id')->on('type_fourniture')->onDelete('cascade');
            $table->bigInteger('contrat_id')->unsigned()->nullable();
            $table->foreign('contrat_id')->references('id')->on('contrat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fourniture');
    }
};
