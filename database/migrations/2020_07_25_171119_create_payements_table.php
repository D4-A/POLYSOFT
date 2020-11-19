<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payements', function (Blueprint $table) {
                $table->string('id',32)->unique()->index();
                $table->string('user_id');
                $table->string('patient_id');
                $table->string('type_payement_id');
                $table->timestamps();
                
                $table->foreign('user_id',35)->references('id')->on('users')
                      ->onDelete('cascade');
                $table->foreign('patient_id',43)->references('id')
                      ->on('patients')->onDelete('cascade');
                $table->foreign('type_payement_id',34)->references('id')
                      ->on('type_payements')->onDelete('cascade');
            });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payements');
    }
}
