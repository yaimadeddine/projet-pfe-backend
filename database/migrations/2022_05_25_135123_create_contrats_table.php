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
        Schema::create('contrat', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('matricule');
            $table->date('date');
            $table->date('date_garantie');
            $table->bigInteger('fournisseur_id')->unsigned()->nullable();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseur')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrat');
    }
};
