<?php

use Illuminate\Database\Query\Builder as QueryBuilder;

class Builder
extends Illuminate\Database\Eloquent\Builder
{
    public function withDeceased()
    {
        foreach ((array) $this->query->wheres as $key => $where)
        {
            if ($where["column"] == "died_at" && $where["type"] == "Null")
            {
                unset($this->query->wheres[$key]);

                $this->query->wheres = array_values($this->query->wheres);
            }
        }

        return $this;
    }

    public function onlyDeceased()
    {
        $this->withDeceased();

        $this->query->whereNotNull("died_at");

        return $this;
    }
}