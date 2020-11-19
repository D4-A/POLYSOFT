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
                $table->string('id',32)->unique()->index(); 
                $table->string('user_id'); 
                $table->string('patient_id');
                $table->string('payement_id')->unique();
                $table->string('motif');
                $table->string('antecedent');
                $table->string('historique'); 
                $table->string('examen_physique');
                $table->string('hypothese_dia');
                $table->string('examen_compl'); 
                $table->string('traitement'); 
                $table->timestamps();
                
                $table->foreign('user_id',37)->references('id')->on('users')
                      ->onDelete('cascade');
                $table->foreign('patient_id',44)->references('id')
                      ->on('patients')->onDelete('cascade');
                $table->foreign('payement_id',40)->references('id')
                      ->on('payements')->onDelete('cascade');
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
