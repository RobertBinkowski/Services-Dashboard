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
        Schema::create('payments', function (Blueprint $table){
            $table->id('id')->autoIncrement();
            $table->timestamp('creation_at')->date_timestamp_set();
            $table->timestamp('updated_at')->date_timestamp_set();
            $table->enum('type', ['deposit', 'payment']);
            $table->string('stripe');
            $table->foreignId('users');
            $table->foreignId('contract');
            $table->double('amount');
            $table->boolean('paid')->FALSE;
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
