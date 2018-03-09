<?php

namespace MarcVanDuivenvoorde\BitList;

use MarcVanDuivenvoorde\BitList\Interfaces\BitListInterface;
use MarcVanDuivenvoorde\BitList\Traits\BitListIteratorTrait;
use MarcVanDuivenvoorde\BitList\Traits\BitListParserTrait;
use MarcVanDuivenvoorde\BitList\Traits\BitListTrait;

/**
 * Class BitListImmutable.
 *
 * @package MarcVanDuivenvoorde\BitList
 */
class BitListImmutable implements BitListInterface
{
    use BitListIteratorTrait;
    use BitListParserTrait;
    use BitListTrait;

    /**
     * BitListImmutable constructor.
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
        $list = $this->getList();
        $nextKey = (int) (max(array_keys($list)) * 2);

        $list[$nextKey] = $value;

        return new BitListImmutable($list);
    }

    /**
     * @inheritdoc
     */
    public function set(int $bit, $value): BitListInterface
    {
        $list = $this->getList();
        $itemsToUpdate = $this->getItemsByBitWithBitAsKey($bit, $list);

        foreach (array_keys($itemsToUpdate) as $index) {
            $list[$index] = $value;
        }

        return new BitListImmutable($list);
    }

}
