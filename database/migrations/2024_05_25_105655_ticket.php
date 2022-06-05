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
        Schema::create('ticket', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('status');
            $table->text('commentaire');
            $table->bigInteger('material_id')->unsigned();
            $table->bigInteger('tech_id')->unsigned()->nullable();
            $table->date('date_fin')->nullable();
            $table->foreign('material_id')->references('id')->on('materiel')->onDelete('cascade');
            $table->foreign('tech_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('ticket');
    }
};
