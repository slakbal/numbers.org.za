<?php

class Person
extends BaseModel
{
    protected $table = "person";

    public function gender()
    {
        return $this->belongsTo("Gender");
    }

    public function title()
    {
        return $this->belongsTo("Title");
    }

    public function parents()
    {
        return $this->belongsToMany("Person", "person_parent", "person_id", "parent_id");
    }

    public function children()
    {
        return $this->belongsToMany("Person", "person_child", "person_id", "child_id");
    }

    public function siblings()
    {
        return $this->belongsToMany("Person", "person_sibling", "person_id", "sibling_id");
    }

    public function spouses()
    {
        return $this->belongsToMany("Person", "person_spouse", "person_id", "spouse_id");
    }

    public function newEloquentBuilder($query)
    {
        $builder = new PersonBuilder($query);

        return $builder->whereNull("died_at");
    }

    public function getHumanBornAtAttribute()
    {
        return $this->getHumanTimestampAttribute("born_at");
    }

    public function getHumanDiedAtAttribute()
    {
        return $this->getHumanTimestampAttribute("died_at");
    }
}
