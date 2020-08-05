<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('payement_id')->unique();
            $table->unsignedBigInteger('creneau_id')->unique();
            $table->string('description')->nullable();
            $table->string('etat');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('patient_id')
                  ->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('payement_id')
                  ->references('id')->on('payements')->onDelete('cascade');
            $table->foreign('creneau_id')
                  ->references('id')->on('creneaus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rendez_vouses');
    }
}
