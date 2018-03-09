<?php

namespace MarcVanDuivenvoorde\BitList;

class BitListImmutableTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param int $bit
     * @param array $list
     * @param bool $expected
     *
     * @dataProvider provideTestHasData
     */
    public function testHas($bit, $list, $expected)
    {
        $bitList = new BitListImmutable($list);
        $result = $bitList->has($bit);

        $this->assertSame($expected, $result);
    }

    public function provideTestHasData()
    {
        return [
            '1 is in the list' => [
                1,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c'
                ],
                true
            ],
            '2 is in the list' => [
                3,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c'
                ],
                true
            ],
            '8 is not in the list' => [
                8,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c'
                ],
                false
            ],

        ];
    }

    /**
     * @param int $bit
     * @param array $list
     * @param bool $expected
     *
     * @dataProvider provideTestGetData
     */
    public function testGet($bit, $list, $expected)
    {
        $bitList = new BitListImmutable($list);
        $result = $bitList->get($bit);

        $this->assertSame(
            $result,
            $expected
        );
    }

    public function provideTestGetData()
    {
        return [
            '1 is in the list' => [
                1,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c'
                ],
                [
                    'a',
                ]
            ],
            '2 is in the list' => [
                3,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c'
                ],
                [
                    'a',
                    'b',
                ]
            ],
            '8 is not in the list' => [
                8,
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c'
                ],
                []
            ],

        ];
    }

    public function testAdd()
    {
        $bitlist = new BitListImmutable([
            1 => 'a',
            2 => 'b',
            4 => 'c'
        ]);

        $newImmutable = $bitlist->add('d');

        $this->assertFalse($bitlist->has(8));
        $this->assertTrue($newImmutable->has(8));
        $this->assertSame([], $bitlist->get(8));
        $this->assertSame(['d'], $newImmutable->get(8));
    }

    public function testSetSingleBit()
    {
        $bitlist = new BitListImmutable([
            1 => 'a',
            2 => 'b',
            4 => 'c'
        ]);

        $newImmutable = $bitlist->set(1, 'd');

        $this->assertSame(['a'], $bitlist->get(1));
        $this->assertSame(['d'], $newImmutable->get(1));
    }

    public function testSetCombinedBit()
    {
        $bitlist = new BitListImmutable([
            1 => 'a',
            2 => 'b',
            4 => 'c'
        ]);

        $newImmutable = $bitlist->set(7, 'd');

        $this->assertSame(['a', 'b', 'c'], $bitlist->get(7));
        $this->assertSame(['d', 'd', 'd'], $newImmutable->get(7));
    }

    public function testIteration() {
        $dataset = [
            1 => 'a',
            2 => 'b',
            4 => 'c'
        ];

        $bitlist = new BitListImmutable($dataset);
        $index = 0;

        foreach ($bitlist as $item) {
            $this->assertSame(
                $dataset[$bitlist->key()],
                $item
            );

            $index++;
        }

        $this->assertSame(
            $index,
            count($dataset)
        );
    }
}
