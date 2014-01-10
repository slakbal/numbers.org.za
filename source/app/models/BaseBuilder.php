<?php

class BaseBuilder
extends Illuminate\Database\Eloquent\Builder
{
    protected $embeddables = [];

    protected $filterables = [
        "with-trashed"  => "withTrashed",
        "only-trashed"  => "onlyTrashed"
    ];

    public function embed($embeds)
    {
        foreach ($this->embeddables as $key => $value)
        {
            if (in_array($key, $embeds))
            {
                $this->with($value);
            }
        }

        return $this;
    }

    protected function splitFilters($filters)
    {
        $split = [];

        foreach ($filters as $filter)
        {
            $parts = explode(":", $filter, 2);

            if (count($parts) == 2)
            {
                $split[$parts[0]] = $parts[1];
            }
            else
            {
                $split[$parts[0]] = null;
            }
        }

        return $split;
    }

    public function filter($filters)
    {
        $filters = $this->splitFilters($filters);

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
