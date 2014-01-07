<?php

class PersonChildTableSeeder
extends DatabaseSeeder
{
    public function run()
    {
        PersonChild::truncate();
        PersonParent::truncate();

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
    }
}
