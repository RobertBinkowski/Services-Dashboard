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
        Schema::create('operations', function(Blueprint $table){
            $table->id('id')->autoIncrement();
            $table->dateTime('start_date')->date_timestamp_get();
            $table->dateTime('end_date')->nullable();
            $table->double('duration')->nullable();
            $table->foreignId('contracts');
            $table->timestamp('created_at')->date_timestamp_set();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('operations');
    }
};
