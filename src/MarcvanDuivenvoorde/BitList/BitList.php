<?php


namespace MarcVanDuivenvoorde\BitList;


class BitList {
  /**
   * @param int $bit
   * @param array $list
   *
   * @return array
   */
  public static function getItemsByBit($bit, array $list) {
    $result = [];

    foreach ($list as $index => $row) {
      if ($bit & $index) {
        $result[] = $row;
      }
    }

    return $result;
  }

  /**
   * @param array $items
   * @param array $list
   *
   * @return null|int
   */
  public static function getBitByItems(array $items, array $list) {
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
