<?php

namespace MarcVanDuivenvoorde\BitList\Traits;

/**
 * Class BitListParser.
 *
 * @package MarcVanDuivenvoorde\BitList
 */
trait BitListParserTrait
{
    /**
     * Is the requested bit available in the list. The array key must correspond to
     * the bits.
     *
     * @param int $bit
     * @param array $list
     *
     * @return bool
     */
    public function listHasBit($bit, array $list)
    {
        $max = max(array_keys($list));

        return ($bit < ($max * 2));
    }

    /**
     * Get the items from the list for the bit. The array key must correspond to
     * the bits. The returned value is a list with the items corresponding to the
     * defined bit. The returned array keys are sequential starting with zero.
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
            if ($index > $bit) {
                break;
            }

            if ($bit & $index) {
                $result[] = $row;
            }
        }

        return $result;
    }

    /**
     * Get the items from the list for the bit. The array key must correspond to
     * the bits. The returned value is a list with the items corresponding to the
     * defined bit. The array keys correspond to the returned bit.
     *
     * @param int $bit
     * @param array $list
     *
     * @return array
     */
    public function getItemsByBitWithBitAsKey($bit, array $list)
    {
        $result = [];

        foreach ($list as $index => $row) {
            if ($index > $bit) {
                break;
            }

            if ($bit & $index) {
                $result[$index] = $row;
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
