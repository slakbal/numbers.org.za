<?php

use Illuminate\Database\Migrations\Migration;

class CreatePersonTable
extends Migration
{
    public function up()
    {
        Schema::create("person", function($table)
        {
            $table->increments("id");
            $table->integer("gender_id")->nullable();
            $table->integer("title_id")->nullable();
            $table->string("first_name");
            $table->string("last_name");
            $table->date("born_at")->nullable();
            $table->date("died_at")->nullable();
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
            $table->dateTime("deleted_at")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists("person");
    }
}