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
        Schema::create('service', function (Blueprint $table){
            $table->id('id')->autoIncrement();
            $table->timestamp('creation_date')->date_timestamp_set();
            $table->string('mame');
            $table->string('address');
            $table->double('score')->nullable();
            $table->double('price')->nullable();
            $table->foreignId('user');

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
