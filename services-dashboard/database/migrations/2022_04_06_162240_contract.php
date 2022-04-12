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
        Schema::create('contracts', function(Blueprint $table){
            $table->id('id')->autoIncrement();
            $table->dateTime('date')->date_timestamp_get();
            $table->string('address');
            $table->string('document');
            $table->string('details');
            $table->foreignId('users');
            $table->foreignId('service');
            $table->timestamp('creation_at')->date_timestamp_set();
            $table->timestamp('updated_at')->date_timestamp_set();
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
