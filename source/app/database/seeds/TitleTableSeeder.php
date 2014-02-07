<?php

use Api\Title;

class TitleTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        Title::truncate();

        $faker   = $this->getFaker();
        $created = $faker->dateTimeThisYear;

        $titles = [
            [
                "name"       => "Mr",
                "created_at" => $created,
                "updated_at" => $created
            ],
            [
                "name"       => "Mrs",
                "created_at" => $created,
                "updated_at" => $created
            ],
            [
                "name"       => "Miss",
                "created_at" => $created,
                "updated_at" => $created
            ],
            [
                "name"       => "Dr",
                "created_at" => $created,
                "updated_at" => $created
            ],
            [
                "name"       => "Prof",
                "created_at" => $created,
                "updated_at" => $created
            ],
            [
                "name"       => "Rev",
                "created_at" => $created,
                "updated_at" => $created
            ]
        ];

        DB::connection()->table("title")->insert($titles);
    }
}
