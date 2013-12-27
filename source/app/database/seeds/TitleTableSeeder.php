<?php

class TitleTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        $faker   = $this->getFaker();
        $created = $faker->dateTimeThisYear;

        $titles = [
            [
                "name"       => "Mr",
                "created_at" => $created,
                "updated_at" => $created,
                "deleted_at" => null
            ],
            [
                "name"       => "Mrs",
                "created_at" => $created,
                "updated_at" => $created,
                "deleted_at" => null
            ],
            [
                "name"       => "Miss",
                "created_at" => $created,
                "updated_at" => $created,
                "deleted_at" => null
            ],
            [
                "name"       => "Dr",
                "created_at" => $created,
                "updated_at" => $created,
                "deleted_at" => null
            ],
            [
                "name"       => "Prof",
                "created_at" => $created,
                "updated_at" => $created,
                "deleted_at" => null
            ],
            [
                "name"       => "Rev",
                "created_at" => $created,
                "updated_at" => $created,
                "deleted_at" => null
            ]
        ];

        DB::connection()->table("title")->insert($titles);
    }
}