<?php

use Api\Gender;

class GenderTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        Gender::truncate();

        $faker   = $this->getFaker();
        $created = $faker->dateTimeThisYear;

        $genders = [
            [
                "name"       => "Male",
                "created_at" => $created,
                "updated_at" => $created
            ],
            [
                "name"       => "Female",
                "created_at" => $created,
                "updated_at" => $created
            ]
        ];

        DB::connection()->table("gender")->insert($genders);
    }
}
