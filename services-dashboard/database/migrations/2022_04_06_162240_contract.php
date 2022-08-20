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
            $table->longText('document');
            $table->string('details');
            $table->foreignId('users');
            $table->foreignId('service');
            $table->text('customer_signature');
            $table->text('specialist_signature');
            $table->timestamp('created_at')->date_timestamp_set();
            $table->timestamp('updated_at')->nullable();
            $table->enum('status',['Created','Active','Cancelled','Payment', 'Complete'])->default('Created');
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
