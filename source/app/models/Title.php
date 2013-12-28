<?php

class Title
extends Eloquent
{
    protected $table = "title";
    
    protected $softDelete = true;

    public function people()
    {
        return $ths->hasMany("Person");
    }
}