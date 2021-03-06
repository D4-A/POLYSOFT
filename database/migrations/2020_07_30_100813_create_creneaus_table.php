<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreneausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creneaus', function (Blueprint $table) {
                $table->string('id',32)->unique()->index();
                $table->string('user_id');
                $table->string('name')->default('rendez-vous');
                $table->dateTime('start_time',0);
                $table->dateTime('end_time',0);
                $table->boolean('ouvert')->default(true);
                $table->timestamps();
                
                $table->foreign('user_id',36)
                      ->references('id')->on('users')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creneaus');
    }
}
