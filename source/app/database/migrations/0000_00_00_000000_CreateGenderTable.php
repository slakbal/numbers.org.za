<?php

use Illuminate\Database\Migrations\Migration;

class CreateGenderTable
extends Migration
{
    public function up()
    {
        Schema::create("gender", function($table)
        {
            $table->increments("id");
            $table->string("name");
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
            $table->dateTime("deleted_at")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists("gender");
    }
}