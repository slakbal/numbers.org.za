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
        return $this->hasManyThrough("Person", "Parent");
    }

    public function children()
    {
        return $this->hasManyThrough("Person", "Child");
    }

    public function siblings()
    {
        return $this->hasManyThrough("Person", "Sibling");
    }

    public function spouses()
    {
        return $this->hasManyThrough("Person", "Spouse");
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
