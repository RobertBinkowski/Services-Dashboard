<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation', function(Blueprint $table){
            $table->id('id')->autoIncrement();
            $table->dateTime('start_date')->date_timestamp_get();
            $table->dateTime('end_date')->nullable();
            $table->double('duration');
            $table->foreignId('contract');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
