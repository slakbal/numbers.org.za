<?php

class PersonSiblingTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        PersonSibling::truncate();

        $faker  = $this->getFaker();
        $people = Person::all()->lists("id");

        for ($i = 0; $i < 10; $i++) {
            $person  = $faker->unique()->randomElement($people);
            $sibling = $faker->unique()->randomElement($people);

            $timestamps = $this->getTimestamps();

            DB::table("person_sibling")->insert([
                "sibling_id" => $sibling,
                "person_id"  => $person,
                "created_at" => $timestamps["created"],
                "updated_at" => $timestamps["updated"],
                "deleted_at" => $timestamps["deleted"]
            ]);

            DB::table("person_sibling")->insert([
                "sibling_id" => $person,
                "person_id"  => $sibling,
                "created_at" => $timestamps["created"],
                "updated_at" => $timestamps["updated"],
                "deleted_at" => $timestamps["deleted"]
            ]);
        }
    }
}
