<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('payement_id');
            $table->string('antecedent');
            $table->string('historique'); 
            $table->string('examen_physique');
            $table->string('hypothese_dia');
            $table->string('examen_compl'); 
            $table->string('traitement'); 
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')
                ->onDelete('cascade');
            $table->foreign('payement_id')->references('id')->on('payements')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
