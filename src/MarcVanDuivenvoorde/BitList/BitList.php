<?php

namespace MarcVanDuivenvoorde\BitList;

use MarcVanDuivenvoorde\BitList\Interfaces\BitListInterface;
use MarcVanDuivenvoorde\BitList\Traits\BitListIteratorTrait;
use MarcVanDuivenvoorde\BitList\Traits\BitListParserTrait;
use MarcVanDuivenvoorde\BitList\Traits\BitListTrait;

/**
 * Class BitList.
 *
 * @package MarcVanDuivenvoorde\BitList
 */
class BitList implements BitListInterface
{
    use BitListIteratorTrait;
    use BitListParserTrait;
    use BitListTrait;

    /**
     * BitList constructor.
     *
     * @param array $list
     */
    public function __construct(array $list)
    {
        if (!$this->isValid($list)) {
            throw new \RuntimeException('Cannot use this input list.');
        }

        $this->list = $list;
    }

    /**
     * @inheritdoc
     */
    public function add($value): BitListInterface
    {
        $nextKey = (int) (max(array_keys($this->list)) * 2);
        $this->list[$nextKey] = $value;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function set(int $bit, $value): BitListInterface
    {
        $itemsToUpdate = $this->getItemsByBitWithBitAsKey($bit, $this->list);

        if (empty($itemsToUpdate)) {
            $this->list[$bit] = $value;

            return $this;
        }

        foreach (array_keys($itemsToUpdate) as $index) {
            $this->list[$index] = $value;
        }

        return $this;
    }

}
