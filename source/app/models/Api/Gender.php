<?php

namespace Api;

class Gender
extends BaseModel
{
    protected $table = "gender";

    public function people()
    {
        return $ths->hasMany("Api\Person");
    }
}
