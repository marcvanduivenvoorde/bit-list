<?php

namespace MarcVanDuivenvoorde\BitList;

class BitListGeneratorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param array $input
     *
     * @dataProvider provideGenerateData
     */
    public function testGenerate($input)
    {
        $generator = new BitListGenerator();
        $bitlist = $generator->generate($input);
        $index = 1;

        foreach ($input as $value) {
            $this->assertSame(
                [$value],
                $bitlist->get($index)
            );

            $index *= 2;
        }
    }

    /**
     * @return array
     */
    public function provideGenerateData()
    {
        return [
            'correct sequenced set is the same' => [
                [
                    1 => 'a',
                    2 => 'b',
                    4 => 'c',
                ],
                [
                    'foo' => 'bar',
                    'bong' => 'beer',
                    'beer' => 'fest',
                ]

            ]
        ];
    }

    /**
     * @param array $input
     *
     * @dataProvider provideGenerateData
     */
    public function testGenerateImmutable($input)
    {
        $generator = new BitListGenerator();
        $bitlist = $generator->generateImmutable($input);
        $index = 1;

        foreach ($input as $value) {
            $this->assertSame(
                [$value],
                $bitlist->get($index)
            );

            $index *= 2;
        }
    }
}
