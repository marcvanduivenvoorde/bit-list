<?php

namespace MarcVanDuivenvoorde\BitList\Interfaces;

/**
 * Interface BitListInterface.
 *
 * @package MarcVanDuivenvoorde\BitList\Interfaces
 */
interface BitListInterface extends \Iterator
{
    /**
     * Is the bit available in the list.
     *
     * @param int $bit
     *
     * @return bool
     */
    public function has(int $bit): bool;

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
