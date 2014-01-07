<?php

class Gender
extends BaseModel
{
    protected $table = "gender";

    public function people()
    {
        return $ths->hasMany("Person");
    }
}
