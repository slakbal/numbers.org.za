<?php

use Illuminate\Database\Migrations\Migration;

class CreatePersonRelativeTable
extends Migration
{
    public function up()
    {
        Schema::create("person_relative", function ($table) {
            $table->increments("id");
            $table->integer("person_id");
            $table->integer("relative_id");
            $table->string("relative_type");
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
            $table->dateTime("deleted_at")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists("person_relative");
    }
}
