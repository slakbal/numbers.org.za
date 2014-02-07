<?php

class Person
extends BaseModel
{
    public function index()
    {
        return $this->request("/person/index", "GET", [

        ]);
    }

    public function deceased()
    {
        return $this->request("/person/deceased", "GET", [

        ]);
    }

    public function deleted()
    {
        return $this->request("/person/deleted", "GET", [

        ]);
    }
}