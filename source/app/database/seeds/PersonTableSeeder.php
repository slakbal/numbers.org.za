<?php

class PersonTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        $faker   = $this->getFaker();
        $genders = Gender::all()->lists("id");
        $titles  = Title::all()->lists("id");

        for ($i = 0; $i < 100; $i++)
        {
            $created = $faker->dateTimeThisYear;
            $deleted = $faker->optional(0.1)->dateTimeThisYear;

            while ($deleted != null and $created->getTimestamp() >= $deleted->getTimestamp())
            {
                $deleted = $faker->optional(0.1)->dateTimeThisYear;
            }

            DB::table("person")->insert([
                "first_name" => $faker->firstName,
                "last_name"  => $faker->lastName,
                "gender_id"  => $faker->optional(0.8)->randomElement($genders),
                "title_id"   => $faker->optional(0.5)->randomElement($titles),
                "born_at"    => $faker->optional(0.5)->dateTimeThisCentury,
                "died_at"    => $faker->optional(0.1)->dateTimeThisDecade,
                "created_at" => $created,
                "updated_at" => $created,
                "deleted_at" => $deleted
            ]);
        }
    }
}