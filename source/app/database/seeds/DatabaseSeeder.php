<?php

class DatabaseSeeder
extends Seeder
{
    protected $faker;

    public function getFaker()
    {
        if (empty($this->faker)) {
            $this->faker = Faker\Factory::create();
        }

        return $this->faker;
    }

    public function getTimestamps()
    {
        $faker = $this->getFaker();

        $created = $faker->dateTimeThisYear;
        $updated = $faker->optional(0.8)->dateTimeThisYear;
        $deleted = $faker->optional(0.1)->dateTimeThisYear;

        while ($updated != null and $created->getTimestamp() >= $updated->getTimestamp()) {
            $updated = $faker->optional(0.8)->dateTimeThisYear;
        }

        while ($deleted != null and $created->getTimestamp() >= $deleted->getTimestamp()) {
            $deleted = $faker->optional(0.1)->dateTimeThisYear;
        }

        if ($updated == null) {
            $updated = $created;
        }

        return [
            "created" => $created,
            "updated" => $updated,
            "deleted" => $deleted
        ];
    }

    public function run()
    {
        if (App::environment() == "production") {
            $this->command->info("Seeding disabled on production.");

            return;
        }

        $this->call("TitleTableSeeder");
        $this->call("GenderTableSeeder");
        $this->call("PersonTableSeeder");
    }
}
