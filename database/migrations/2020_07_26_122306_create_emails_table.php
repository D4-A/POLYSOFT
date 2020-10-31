<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
                $table->id();
                $table->string('user_id');
                $table->string('consultation_id')->nullable();
                $table->string('subject');
                $table->string('body');
                $table->string('filename')->nullable();
                $table->timestamps();
                
                $table->foreign('user_id',38)->references('id')->on('users')
                      ->onDelete('cascade');
                $table->foreign('consultation_id',47)->references('id')
                      ->on('consultations')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
