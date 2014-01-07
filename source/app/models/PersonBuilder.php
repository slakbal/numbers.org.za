<?php

class PersonBuilder
extends Illuminate\Database\Eloquent\Builder
{
    protected function isDeceasedConstraint($where)
    {
        if ($where["column"] == "died_at" and $where["type"] == "Null") {
            return true;
        }

        return false;
    }

    public function withDeceased()
    {
        $this->query->wheres = array_values(
            array_filter($this->query->wheres, function ($where) {
                return !$this->isDeceasedConstraint($where);
            })
        );

        return $this;
    }

    public function onlyDeceased()
    {
        $this->withDeceased();
        $this->query->whereNotNull("died_at");
        
        return $this;
    }
}
