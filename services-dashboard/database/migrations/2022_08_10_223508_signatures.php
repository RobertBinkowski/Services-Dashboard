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
        Schema::create('signatures', function (Blueprint $table){
            $table->id('id')->autoIncrement();
            $table->timestamp('created_at')->date_timestamp_set();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('users');
            $table->foreignId('contract');
            $table->string('hash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('signature');
    }
};
