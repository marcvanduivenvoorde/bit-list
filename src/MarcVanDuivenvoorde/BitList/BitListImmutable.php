<?php
/**
 * @copyright (c) 2018 D-beat media
 */

namespace MarcVanDuivenvoorde\BitList;


use MarcVanDuivenvoorde\BitList\Interfaces\BitListInterface;
use MarcVanDuivenvoorde\BitList\Traits\BitListIteratorTrait;
use MarcVanDuivenvoorde\BitList\Traits\BitListParserTrait;

class BitListImmutable implements BitListInterface
{
    use BitListIteratorTrait;
    use BitListParserTrait;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function get(int $bit)
    {
        return $this->getItemsByBit($bit, $this->getList());
    }

    public function add($value): BitListInterface
    {
        $list = $this->getList();
        $nextKey = max(array_keys($list)) * 2;

        $list[$nextKey] = $value;

        return new BitListImmutable($list);
    }

    public function set(int $bit, $value): BitListInterface
    {
        $list = $this->getList();

        $itemsToUpdate = $this->getItemsByBitWithBitAsKey($bit, $list);

        foreach ($itemsToUpdate as $index => $replace) {
            $list[$index] = $value;
        }

        return new BitListImmutable($list);
    }

    protected function getList()
    {
        return $this->list;
    }
}