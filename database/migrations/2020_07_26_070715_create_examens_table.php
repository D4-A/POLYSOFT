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
            $table->id();
            $table->string('user_id');
            $table->unsignedBigInteger('consultation_id');
            $table->string('payment_id')->unique();
            $table->string('nom_examen');
            $table->string('files');
            $table->timestamps();

            $table->foreign('user_id',39)->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('consultation_id')->references('id')
                  ->on('consultations')
                  ->onDelete('cascade');
            $table->foreign('payment_id',41)->references('id')->on('payements')
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
        Schema::dropIfExists('examens');
    }
}
