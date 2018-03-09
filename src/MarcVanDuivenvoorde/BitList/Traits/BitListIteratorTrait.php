<?php

namespace MarcVanDuivenvoorde\BitList\Traits;

/**
 * Trait BitListIteratorTrait
 *
 * @package MarcVanDuivenvoorde\BitList\Traits
 */
trait BitListIteratorTrait
{
    /**
     * The data list.
     * @var array
     */
    protected $list = [];

    /**
     * The starting index.
     *
     * @var int
     */
    protected $index = 1;

    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->list[$this->index];
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        $this->index *= 2;
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return array_key_exists($this->index, $this->list);
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->index = 1;
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return $this->index;
    }

}
