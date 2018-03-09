<?php

namespace MarcVanDuivenvoorde\BitList;

use MarcVanDuivenvoorde\BitList\Traits\BitListParserTrait;
use Prophecy\Prophet;

class BitListParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @var BitListParserTrait
     */
    private $bitListParser;

    public function setUp()
    {
        $this->bitListParser = new BitListParserTrait();
    }

    /**
     * @param int $bit
     * @param array $list
     * @param bool $expected
     *
     * @dataProvider provideTestListHasBitData
     */
    public function testListHasBit($bit, $list, $expected)
    {
        $result = $this->bitListParser->listHasBit($bit, $list);

        $this->assertSame(
            $result,
            $expected
        );
    }

    public function provideTestListHasBitData()
    {
        return [
            'bit 1 exists' => [
                1,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                true,
            ],
            'bit 2 exists' => [
                2,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                true,
            ],
            'bit 3 exists' => [
                3,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                true,
            ],
            'bit 4 exists' => [
                4,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                true,
            ],
            'bit 5 exists' => [
                5,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                true,
            ],
            'bit 6 exists' => [
                5,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                true,
            ],
            'bit 7 exists' => [
                7,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                true,
            ],
            'bit 8 does not exists' => [
                8,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                false,
            ],
            'bit 9 does not exists' => [
                9,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                false,
            ],
        ];
    }


    /**
     * @param int $bit
     * @param array $list
     * @param array $expected
     *
     * @dataProvider provideGetItemsByBitData()
     */
    public function testGetItemsByBit($bit, $list, $expected)
    {
        $result = $this->bitListParser->getItemsByBit($bit, $list);

        $this->assertSame(
            $result,
            $expected
        );
    }

    public function provideGetItemsByBitData() {
        return [
            'bit 1 returns a' => [
                1,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    'a'
                ],
            ],
            'bit 2 returns b' => [
                2,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    'b'
                ],
            ],
            'bit 3 returns a and b' => [
                3,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    'a',
                    'b',
                ],
            ],
            'bit 4 returns c' => [
                4,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    'c',
                ],
            ],
            'bit 5 returns a and c' => [
                5,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    'a',
                    'c',
                ],
            ],
            'bit 6 returns b and c' => [
                6,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    'b',
                    'c'
                ],
            ],
            'bit 7 returns a, b and c' => [
                7,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    'a',
                    'b',
                    'c',
                ],
            ],
            'bit 8 returns empty array' => [
                8,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [],
            ],
            'bit 9 returns a' => [
                9,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    'a'
                ],
            ],
        ];
    }

    /**
     * @dataProvider provideGetItemsByBitWithBitAsKeyData()
     */
    public function testGetItemsByBitWithBitAsKey($bit, $list, $expected)
    {
        $result = $this->bitListParser->getItemsByBitWithBitAsKey($bit, $list);

        $this->assertSame(
            $result,
            $expected
        );
    }

    public function provideGetItemsByBitWithBitAsKeyData() {
        return [
            'bit 1 returns a' => [
                1,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    1 => 'a',
                ],
            ],
            'bit 2 returns b' => [
                2,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    2 => 'b',
                ],
            ],
            'bit 3 returns a and b' => [
                3,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    1 => 'a',
                    2 => 'b',
                ],
            ],
            'bit 4 returns c' => [
                4,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    4 => 'c',
                ],
            ],
            'bit 5 returns a and c' => [
                5,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    1 => 'a',
                    4 => 'c',
                ],
            ],
            'bit 6 returns b and c' => [
                6,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    2 => 'b',
                    4 => 'c',
                ],
            ],
            'bit 7 returns a, b and c' => [
                7,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
            ],
            'bit 8 returns empty array' => [
                8,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [],
            ],
            'bit 9 returns a' => [
                9,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    1 => 'a',
                ],
            ],
        ];
    }

    /**
     * @param array $items
     * @param array $list
     * @param int $expected
     *
     * @dataProvider provideGetBitByItemsData()
     */
    public function testGetBitByItems($items, $list, $expected)
    {
        $result = $this->bitListParser->getBitByItems($items, $list);

        $this->assertSame(
            $expected,
            $result
        );
    }

    public function provideGetBitByItemsData()
    {
        return [
            'a is bit 1' => [
                [
                'a'
                ],
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                1
            ],

            'b is bit 2' => [
                [
                'b'
                ],
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                2
            ],

            'a and b is bit 3' => [
                [
                    'a',
                    'b'
                ],
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                3
            ],
        ];
    }
}
