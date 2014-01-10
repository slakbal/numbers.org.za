<?php

namespace Api;

use Config;
use Input;
use Person;
use Response;

class PersonController
extends BaseController
{
    protected $order = "last_name";

    public function indexAction()
    {
        $people = Person::filter($this->filter)
            ->embed($this->embed)
            ->orderBy($this->order, $this->direction)
            ->paginate($this->limit);

        return Response::json([
            "data" => $people->getCollection()->toArray(),
            "meta" => [
                "total" => $people->getTotal(),
                "limit" => $people->getPerPage(),
                "page"  => $people->getCurrentPage()
            ]
        ]);
    }

    public function showAction()
    {
        // TODO
    }

    public function addAction()
    {
        // TODO
    }

    public function editAction()
    {
        // TODO
    }

    public function relateAction()
    {
        // TODO
    }

    public function unrelateAction()
    {
        // TODO
    }

    public function deleteAction()
    {
        // TODO
    }

    public function restoreAction()
    {
        // TODO
    }
}