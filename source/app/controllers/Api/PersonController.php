<?php

namespace Api;

use Config;
use Person;
use Response;

class PersonController
extends BaseController
{
    protected $order = "last_name";

    protected $embeddables = [
        "gender"   => "gender",
        "title"    => "title",
        "parents"  => "parents",
        "children" => "children",
        "spouses"  => "spouses",
        "siblings" => "siblings"
    ];

    public function indexAction()
    {
        $query = Person::orderBy($this->order, $this->direction);

        // TODO: filters

        $query->embed($this->embed, $this->embeddables);

        $people = $query->paginate($this->limit);

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