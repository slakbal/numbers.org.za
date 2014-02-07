<?php

namespace Api;

use Api\PersonBuilder;

class Person
extends BaseModel
{
    protected $table = "person";

    protected $hidden = ["pivot"];

    public function gender()
    {
        return $this->belongsTo("Api\Gender");
    }

    public function title()
    {
        return $this->belongsTo("Api\Title");
    }

    public function parents()
    {
        return $this->belongsToMany("Api\Person", "person_parent", "person_id", "parent_id");
    }

    public function children()
    {
        return $this->belongsToMany("Api\Person", "person_child", "person_id", "child_id");
    }

    public function siblings()
    {
        return $this->belongsToMany("Api\Person", "person_sibling", "person_id", "sibling_id");
    }

    public function spouses()
    {
        return $this->belongsToMany("Api\Person", "person_spouse", "person_id", "spouse_id");
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
