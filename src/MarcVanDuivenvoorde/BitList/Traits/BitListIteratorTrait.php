<?php

namespace MarcVanDuivenvoorde\BitList\Traits;

trait BitListIteratorTrait
{
    protected $list = [];

    protected $index = 1;

    public function current()
    {
        return $this->list[$this->index];
    }

    public function next()
    {
        $this->index = $this->index * 2;
    }

    public function valid()
    {
        return array_key_exists($this->index, $this->list);
    }

    public function rewind()
    {
        $this->index = 1;
    }

    public function key()
    {
        return $this->index;
    }

}