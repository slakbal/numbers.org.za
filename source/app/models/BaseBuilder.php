<?php

class BaseBuilder
extends Illuminate\Database\Eloquent\Builder
{
    protected $embeddables = [];

    protected $filterables = [
        "with-trashed"  => "filterWithTrashed",
        "only-trashed"  => "filterOnlyTrashed"
    ];

    public function filterWithTrashed()
    {
        $this->withTrashed();
    }

    public function filterOnlyTrashed()
    {
        $this->onlyTrashed();
    }

    public function embed($embed)
    {
        foreach ($this->embeddables as $label => $name)
        {
            if (in_array($label, $embed))
            {
                $this->with($name);
            }
        }

        return $this;
    }

    public function filter($filter)
    {
        $filters = [];

        foreach ($filter as $raw)
        {
            $parts = explode(":", $raw, 2);

            if (count($parts) == 2)
            {
                $filters[$parts[0]] = $parts[1];
            }
            else
            {
                $filters[$parts[0]] = null;
            }
        }

        foreach ($filters as $key1 => $value1)
        {
            foreach ($this->filterables as $key2 => $value2)
            {
                if ($key1 == $key2)
                {
                    call_user_func([$this, $value2], $value1);
                }
            }
        }

        return $this;
    }
}
