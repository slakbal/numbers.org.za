<?php

use Api\Gender;
use Api\Person;
use Api\Title;

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

        // children + parents

        DB::table("person_child")->truncate();
        DB::table("person_parent")->truncate();

        $faker  = $this->getFaker();
        $people = Person::all()->lists("id");

        for ($i = 0; $i < 10; $i++) {
            $child  = $faker->unique()->randomElement($people);
            $parent = $faker->unique()->randomElement($people);

            $timestamps = $this->getTimestamps();

            DB::table("person_child")->insert([
                "child_id"   => $child,
                "person_id"  => $parent,
                "created_at" => $timestamps["created"],
                "updated_at" => $timestamps["updated"],
                "deleted_at" => $timestamps["deleted"]
            ]);

            DB::table("person_parent")->insert([
                "parent_id"  => $parent,
                "person_id"  => $child,
                "created_at" => $timestamps["created"],
                "updated_at" => $timestamps["updated"],
                "deleted_at" => $timestamps["deleted"]
            ]);
        }

        // siblings

        DB::table("person_sibling")->truncate();

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

        // spouses

        DB::table("person_spouse")->truncate();

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
