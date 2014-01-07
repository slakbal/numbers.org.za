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

    public function relatives($type)
    {
        return $this->belongsToMany("Person", "person_relative", "relative_id", "person_id")
            ->where("relative_type", $type);
    }

    public function parents()
    {
        return $this->relatives("parent");
    }

    public function children()
    {
        return $this->relatives("child");
    }

    public function siblings()
    {
        return $this->relatives("sibling");
    }

    public function spouses()
    {
        return $this->relatives("spouse");
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
