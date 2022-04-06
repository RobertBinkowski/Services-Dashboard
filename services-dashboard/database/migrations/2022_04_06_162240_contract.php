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
        Schema::create('contract', function(Blueprint $table){
            $table->id('id')->autoIncrement();
            $table->dateTime('date')->date_timestamp_get();
            $table->string('address');
            $table->string('doc_location');
            $table->string('details');
            $table->foreignId('user');
            $table->foreignId('service');
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
