<?php

class PersonBuilder
extends BaseBuilder
{
    protected $embeddables = [
        "gender"   => "gender",
        "title"    => "title",
        "parents"  => "parents",
        "children" => "children",
        "spouses"  => "spouses",
        "siblings" => "siblings"
    ];

    protected $filterables = [
        "has-children"  => "filterHasChildren",
        "has-parents"   => "filterHasParents",
        "has-siblings"  => "filterHasSiblings",
        "has-spouses"   => "filterHasSpouses",
        "with-deceased" => "filterWithDeceased",
        "only-deceased" => "filterOnlyDeceased",
        "with-trashed"  => "withTrashed",
        "only-trashed"  => "onlyTrashed"
    ];

    protected function filterHasChildren()
    {
        $this->has("children");
    }

    protected function filterHasParents()
    {
        $this->has("parents");
    }

    protected function filterHasSiblings()
    {
        $this->has("siblings");
    }

    protected function filterHasSpouses()
    {
        $this->has("spouses");
    }

    public function filterWithDeceased()
    {
        $this->query->wheres = array_values(
            array_filter($this->query->wheres, function ($where) {

                if ($where["column"] == "died_at" and $where["type"] == "Null") {
                    return false;
                }

                return true;

            })
        );

        return $this;
    }

    public function filterOnlyDeceased()
    {
        $this->filterWithDeceased();
        $this->query->whereNotNull("died_at");

        return $this;
    }
}
