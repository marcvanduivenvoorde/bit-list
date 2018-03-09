<?php

namespace MarcVanDuivenvoorde\BitList\Traits;

/**
 * Trait BitListTrait
 *
 * @package MarcVanDuivenvoorde\BitList\Traits
 */
trait BitListTrait
{
    /**
     * @inheritdoc
     */
    public function has(int $bit): bool
    {
        return $this->listHasBit($bit, $this->list);
    }

    /**
     * @inheritdoc
     */
    public function get(int $bit)
    {
        return $this->getItemsByBit($bit, $this->getList());
    }

    /**
     * Get the list.
     *
     * @return array
     */
    protected function getList()
    {
        return $this->list;
    }

    /**
     * Check if the imported data set is a valid sequenced list.
     *
     * @param array $list
     *
     * @return bool
     */
    protected function isValid(array $list)
    {
        $start = 1;

        foreach (array_keys($list) as $index) {
            if ($index !== $start) {
                return false;
            }

            $start *= 2;
        }

        return true;
    }
}
