<?php
/**
 * @copyright (c) 2018 D-beat media
 */

namespace MarcVanDuivenvoorde\BitList\Interfaces;


interface BitListInterface extends \Iterator
{
    /**
     * Get the value for a bit from the list.
     *
     * @param int $bit
     * @return mixed
     */
    public function get(int $bit);

    /**
     * Add a value to the list.
     *
     * @param $value
     * @return BitListInterface
     */
    public function add($value): BitListInterface;

    /**
     * Set the value for a bit.
     *
     * @param int $bit
     * @param $value
     * @return BitListInterface
     */
    public function set(int $bit, $value): BitListInterface;
}