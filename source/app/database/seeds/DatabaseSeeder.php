<?php

class DatabaseSeeder
extends Seeder
{
    protected $faker;

    public function getFaker()
    {
        if (empty($this->faker))
        {
            $this->faker = Faker\Factory::create();
        }
        
        return $this->faker;
    }

    public function run()
    {
        if (App::environment() == "production")
        {
            $this->command->info("Seeding disabled on production.");
            return;
        }

        $tables = [
            "title",
            "gender",
            "person"
        ];

        foreach ($tables as $table)
        {
            $this->command->line("<info>Cleared:</info> " . $table);
            DB::connection()->table($table)->delete();
        }

        $this->call("TitleTableSeeder");
        $this->call("GenderTableSeeder");
        $this->call("PersonTableSeeder");
    }

}