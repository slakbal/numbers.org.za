<?php

class PersonController
extends BaseController
{
    public function searchAction()
    {
        return View::make("person/search");
    }
}
