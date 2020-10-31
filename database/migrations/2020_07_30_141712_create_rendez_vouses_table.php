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
            $table->string('patient_id');
            $table->string('payement_id')->unique();
            $table->string('creneau_id')->unique();
            $table->string('description')->nullable();
            $table->string('etat');
            $table->timestamps();
            
            $table->foreign('patient_id',45)
                  ->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('payement_id',42)
                  ->references('id')->on('payements')->onDelete('cascade');
            $table->foreign('creneau_id',48)
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
