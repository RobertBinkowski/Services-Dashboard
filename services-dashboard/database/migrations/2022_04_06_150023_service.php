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
        Schema::create('services', function (Blueprint $table){
            $table->id('id')->autoIncrement();
            $table->timestamp('creation_at')->date_timestamp_set();
            // $table->timestamp('updated_at')->date_timestamp_set();
            $table->string('name');
            $table->string('address');
            $table->double('range')->default(100);
            $table->double('score')->nullable();
            $table->double('price')->nullable();
            $table->foreignId('users');
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
