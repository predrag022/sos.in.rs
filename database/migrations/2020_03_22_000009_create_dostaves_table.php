<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDostavesTable extends Migration
{
    public function up()
    {
        Schema::create('dostaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('status')->nullable();
            $table->longText('spisak')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('random')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
