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
            $table->string('address');
            // $table->string('document');
            $table->string('details');
            $table->foreignId('users');
            $table->foreignId('service');
            $table->string('signature');
            $table->timestamp('created_at')->date_timestamp_set();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('completed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contracts');
    }
};
