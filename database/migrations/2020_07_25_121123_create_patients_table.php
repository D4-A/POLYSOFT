<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
                $table->string('id',32)->unique()->index();
                $table->string('nom');
                $table->string('prenom');
                $table->string('genre');
                $table->string('ans_naiss');
                $table->string('profession');
                $table->string('adresse');
                $table->string('tel')->unique();
                $table->string('email')->unique()->nullable();
                $table->string('cni')->unique();
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
        Schema::dropIfExists('patients');
    }
}
