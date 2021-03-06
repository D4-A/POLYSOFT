<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
                $table->string('id',32)->unique()->index();
                $table->string('user_id');
                $table->string('consultation_id');
                $table->string('payment_id')->unique();
                $table->string('nom_examen');
                $table->string('files');
                $table->timestamps();
                
                $table->foreign('user_id',39)->references('id')->on('users')
                      ->onDelete('cascade');
                $table->foreign('consultation_id',46)->references('id')
                      ->on('consultations')->onDelete('cascade');
                $table->foreign('payment_id',41)->references('id')
                      ->on('paiements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examens');
    }
}
