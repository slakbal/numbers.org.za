<?php

namespace Api;

class Title
extends BaseModel
{
    protected $table = "title";

    public function people()
    {
        return $ths->hasMany("Api\Person");
    }
}
