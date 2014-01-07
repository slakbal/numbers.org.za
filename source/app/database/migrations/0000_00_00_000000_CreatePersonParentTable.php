<?php

use Illuminate\Database\Migrations\Migration;

class CreatePersonParentTable
extends Migration
{
    public function up()
    {
        Schema::create("person_parent", function ($table) {
            $table->increments("id");
            $table->integer("person_id");
            $table->integer("parent_id");
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
            $table->dateTime("deleted_at")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists("person_parent");
    }
}
