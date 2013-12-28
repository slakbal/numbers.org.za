<?php

use Carbon\Carbon;

class Person
extends Eloquent
{
    protected $table = "person";

    protected $softDelete = true;

    public function gender()
    {
        return $this->belongsTo("Gender");
    }

    public function title()
    {
        return $this->belongsTo("Title");
    }

    public function newQuery($excludeDeleted = true)
    {
        $builder = new Builder($this->newBaseQueryBuilder());

        $builder->setModel($this)->with($this->with);

        if ($excludeDeleted && $this->softDelete)
        {
            $builder->whereNull($this->getQualifiedDeletedAtColumn());
        }

        $builder->whereNull("died_at");

        return $builder;
    }

    public function getHumanCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes["created_at"])->diffForHumans();
    }

    public function getHumanUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes["updated_at"])->diffForHumans();
    }

    public function getHumanDeletedAtAttribute()
    {
        if ($this->attributes["deleted_at"])
        {
            return Carbon::parse($this->attributes["deleted_at"])->diffForHumans();
        }

        return null;
    }

    public function getHumanBornAtAttribute()
    {
        if ($this->attributes["born_at"])
        {
            return Carbon::parse($this->attributes["born_at"])->diffForHumans();
        }

        return null;
    }

    public function getHumanDiedAtAttribute()
    {
        if ($this->attributes["died_at"])
        {
            return Carbon::parse($this->attributes["died_at"])->diffForHumans();
        }

        return null;
    }
}