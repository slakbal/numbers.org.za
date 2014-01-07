<?php

use Illuminate\Database\Migrations\Migration;

class CreatePersonChildTable
extends Migration
{
    public function up()
    {
        Schema::create("person_child", function ($table) {
            $table->increments("id");
            $table->integer("person_id");
            $table->integer("child_id");
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
            $table->dateTime("deleted_at")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists("person_child");
    }
}
