<?php

namespace MarcVanDuivenvoorde\BitList;

use MarcVanDuivenvoorde\BitList\Interfaces\BitListInterface;
use MarcVanDuivenvoorde\BitList\Traits\BitListIteratorTrait;
use MarcVanDuivenvoorde\BitList\Traits\BitListParserTrait;

class BitList implements BitListInterface
{
    use BitListIteratorTrait;
    use BitListParserTrait;



    public function get(int $bit)
    {
        // TODO: Implement get() method.
    }

    public function add($value): BitListInterface
    {
        // TODO: Implement add() method.
    }

    public function set(int $bit, $value): BitListInterface
    {
        // TODO: Implement set() method.
    }


}