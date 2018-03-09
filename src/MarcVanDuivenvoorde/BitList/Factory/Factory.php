<?php


namespace MarcVanDuivenvoorde\BitList\Factory;


use MarcVanDuivenvoorde\BitList\BitList;
use MarcVanDuivenvoorde\BitList\BitListGenerator;
use MarcVanDuivenvoorde\BitList\BitListImmutable;

/**
 * Class Factory.
 *
 * @package MarcVanDuivenvoorde\BitList\Factory
 */
class Factory
{
    /**
     * Create a bitlist with an array input. The internal generator will resequence if needed.
     *
     * @param array $list
     *
     * @return BitList
     */
    public static function createBitList(array $list): BitList
    {
        $generator = self::getGenerator();

        return $generator->generate($list);
    }

    /**
     * Create a bitlist immutable with an array input. The internal generator will resequence if needed.
     *
     * @param array $list
     *
     * @return BitListImmutable
     */
    public static function createBitListImmutable(array $list): BitListImmutable
    {
        $generator = self::getGenerator();

        return $generator->generateImmutable($list);
    }

    /**
     * Get the generator.
     *
     * @return BitListGenerator|null
     */
    protected static function getGenerator()
    {
        static $generator = null;

        if ($generator === null) {
            $generator = new BitListGenerator();
        }

        return $generator;
    }
}
