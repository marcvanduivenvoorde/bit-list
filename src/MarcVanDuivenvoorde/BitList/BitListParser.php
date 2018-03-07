<?php

namespace MarcVanDuivenvoorde\BitList;

/**
 * Class BitListParser.
 *
 * @package MarcVanDuivenvoorde\BitList
 */
class BitListParser
{

    /**
     * Is the requested bit available in the list.
     *
     * @param int $bit
     * @param array $list
     *
     * @return bool
     */
    public function listHasBit($bit, array $list)
    {
        foreach ($list as $checkBit) {
            if ($bit & $checkBit) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the items from the list for the bit.
     *
     * @param int $bit
     * @param array $list
     *
     * @return array
     */
    public function getItemsByBit($bit, array $list)
    {
        $result = [];

        foreach ($list as $index => $row) {
            if ($bit & $index) {
                $result[] = $row;
            }
        }

        return $result;
    }

    /**
     * Calculate the bit for a subset of the items in the list.
     *
     * @param array $items
     * @param array $list
     *
     * @return null|int
     */
    public function getBitByItems(array $items, array $list)
    {
        $bit = null;

        $searchList = array_flip($list);

        foreach ($items as $item) {
            if (array_key_exists($item, $searchList)) {
                $bit = $bit | $searchList[$item];
            }
        }

        return $bit;
    }

}
