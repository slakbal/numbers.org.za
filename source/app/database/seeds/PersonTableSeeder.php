<?php

class PersonTableSeeder
extends DatabaseSeeder
{
    protected function addRelative($personId, $relativeId, $relativeType)
    {
        $faker   = $this->getFaker();
        $created = $faker->dateTimeThisYear;

        DB::table("person_relative")->insert([
            "person_id"     => $personId,
            "relative_id"   => $relativeId,
            "relative_type" => $relativeType,
            "created_at"    => $created,
            "updated_at"    => $created
        ]);
    }

    public function run()
    {
        Person::truncate();

        $faker   = $this->getFaker();
        $genders = Gender::all()->lists("id");
        $titles  = Title::all()->lists("id");

        for ($i = 0; $i < 100; $i++) {
            $timestamps = $this->getTimestamps();

            DB::table("person")->insert([
                "first_name" => $faker->firstName,
                "last_name"  => $faker->lastName,
                "gender_id"  => $faker->optional(0.8)->randomElement($genders),
                "title_id"   => $faker->optional(0.5)->randomElement($titles),
                "born_at"    => $faker->optional(0.5)->dateTimeThisCentury,
                "died_at"    => $faker->optional(0.1)->dateTimeThisDecade,
                "created_at" => $timestamps["created"],
                "updated_at" => $timestamps["updated"],
                "deleted_at" => $timestamps["deleted"]
            ]);
        }
    }
}
