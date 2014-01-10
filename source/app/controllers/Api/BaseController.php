<?php

namespace Api;

use Controller;
use Input;

class BaseController
extends Controller
{

    protected $embed = "";

    protected $direction = "desc";

    protected $filter = "";

    protected $limit = 10;
    
    protected $order = "created_at";

    public function __construct()
    {
        $this->embed     = explode(",", Input::get("embed", $this->embed));
        $this->direction = Input::get("direction", $this->direction);
        $this->filter    = explode(",", Input::get("filter", $this->filter));
        $this->limit     = Input::get("limit", $this->limit);
        $this->order     = Input::get("order", $this->order);
    }
}
