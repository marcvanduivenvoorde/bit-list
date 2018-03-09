<?php

namespace MarcVanDuivenvoorde\BitList;

class BitListGenerator
{
    /**
     * Convert any array into a bit list.
     *
     * @param array $list
     *
     * @return BitList
     */
    public function generate(array $list): BitList
    {
        return new BitList($this->buildDataList($list));
    }

    /**
     * Convert any array into an immutable bit list.
     *
     * @param array $list
     *
     * @return BitListImmutable
     */
    public function generateImmutable(array $list): BitListImmutable
    {
        return new BitListImmutable($this->buildDataList($list));
    }

    /**
     * Convert the input data into a bit sequenced data set.
     *
     * @param array $list
     *
     * @return array
     */
    protected function buildDataList(array $list): array
    {
        $bit = 1;
        $bitList = [];

        foreach ($list as $value) {
            $bitList[$bit] = $value;

            $bit *= 2;
        }

        return $bitList;
    }
}
