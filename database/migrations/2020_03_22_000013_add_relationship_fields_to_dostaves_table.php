<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDostavesTable extends Migration
{
    public function up()
    {
        Schema::table('dostaves', function (Blueprint $table) {
            $table->unsignedInteger('organization_id')->nullable();
            $table->foreign('organization_id', 'organization_fk_1189726')->references('id')->on('users');
            $table->unsignedInteger('operater_id');
            $table->foreign('operater_id', 'operater_fk_1189727')->references('id')->on('users');
            $table->unsignedInteger('dostavljac_id');
            $table->foreign('dostavljac_id', 'dostavljac_fk_1189728')->references('id')->on('users');
        });

    }
}
