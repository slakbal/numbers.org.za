<?php

use Carbon\Carbon;

class BaseModel
extends Eloquent
{
    protected $softDelete = true;

    protected $guarded = ["id"];

    protected function getHumanTimestampAttribute($column)
    {
        if ($this->attributes[$column])
        {
            return Carbon::parse($this->attributes[$column])->diffForHumans();
        }

        return null;
    }

    public function getHumanCreatedAtAttribute()
    {
        return $this->getHumanTimestampAttribute("created_at");
    }

    public function getHumanUpdatedAtAttribute()
    {
        return $this->getHumanTimestampAttribute("updated_at");
    }

    public function getHumanDeletedAtAttribute()
    {
        return $this->getHumanTimestampAttribute("deleted_at");
    }    
}