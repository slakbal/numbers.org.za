<?php

class PersonSpouseTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        PersonSpouse::truncate();

        $faker  = $this->getFaker();
        $people = Person::all()->lists("id");

        for ($i = 0; $i < 10; $i++) {
            $person = $faker->unique()->randomElement($people);
            $spouse = $faker->unique()->randomElement($people);

            $timestamps = $this->getTimestamps();

            DB::table("person_spouse")->insert([
                "spouse_id"  => $spouse,
                "person_id"  => $person,
                "created_at" => $timestamps["created"],
                "updated_at" => $timestamps["updated"],
                "deleted_at" => $timestamps["deleted"]
            ]);

            DB::table("person_spouse")->insert([
                "spouse_id"  => $person,
                "person_id"  => $spouse,
                "created_at" => $timestamps["created"],
                "updated_at" => $timestamps["updated"],
                "deleted_at" => $timestamps["deleted"]
            ]);
        }
    }
}
