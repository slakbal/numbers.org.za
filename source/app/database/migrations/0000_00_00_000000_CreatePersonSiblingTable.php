<?php

use Illuminate\Database\Migrations\Migration;

class CreatePersonSiblingTable
extends Migration
{
    public function up()
    {
        Schema::create("person_sibling", function ($table) {
            $table->increments("id");
            $table->integer("sibling_id");
            $table->integer("person_id");
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
            $table->dateTime("deleted_at")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists("person_sibling");
    }
}
