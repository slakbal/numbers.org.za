<?php

class Gender
extends Eloquent
{
    protected $table = "gender";
    
    protected $softDelete = true;

    public function people()
    {
        return $ths->hasMany("Person");
    }
}