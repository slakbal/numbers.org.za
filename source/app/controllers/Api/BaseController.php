<?php

namespace Api;

use Controller;
use Input;

class BaseController
extends Controller
{
    protected $embed     = "";
    protected $order     = "created_at";
    protected $direction = "desc";
    protected $limit     = 10;

    public function __construct()
    {
        $this->embed     = explode(",", Input::get("embed", $this->embed));
        $this->order     = Input::get("order", $this->order);
        $this->direction = Input::get("direction", $this->direction);
        $this->limit     = Input::get("limit", $this->limit);
    }
}
