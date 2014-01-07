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
        // TODO
    }

    public function children()
    {
        // TODO
    }

    public function siblings()
    {
        // TODO
    }

    public function spouses()
    {
        // TODO
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
