<?php

class GenderTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        $faker   = $this->getFaker();
        $created = $faker->dateTimeThisYear;

        $genders = [
            [
                "name"       => "Male",
                "created_at" => $created,
                "updated_at" => $created,
                "deleted_at" => null
            ],
            [
                "name"       => "Female",
                "created_at" => $created,
                "updated_at" => $created,
                "deleted_at" => null
            ]
        ];

        DB::connection()->table("gender")->insert($genders);
    }
}