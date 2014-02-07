<?php

class PersonController
extends BaseController
{
    public function indexAction()
    {
        $person = new Person();

        $response = $person->index();
        print_r($response);
        exit();

        return View::make("person/index");
    }

    public function deceasedAction()
    {
        return View::make("person/deceased");
    }

    public function deletedAction()
    {
        return View::make("person/deleted");
    }
}
