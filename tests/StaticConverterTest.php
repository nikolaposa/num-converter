<?php
/**
 * This file is part of the NumConverter package.
 *
 * Copyright (c) Nikola Posa <posa.nikola@gmail.com>
 *
 * For full copyright and license information, please refer to the LICENSE file,
 * located at the package root folder.
 */

namespace NumConverter\Tests;

use NumConverter\StaticConverter;
use NumConverter\NumeralSystems;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
class StaticConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getConversionsSet
     */
    public function testSuccessfullConversion($number, $from, $to, $expected)
    {
        $this->assertSame($expected, StaticConverter::convert($number, $from, $to));
    }

    /**
     * @expectedException \NumConverter\Exception\UnknownNumeralSystemException
     */
    public function testCannotConvertUnknownNumeralSystems()
    {
        StaticConverter::convert(100, NumeralSystems::DECIMAL, 'unknown system');
    }

    /**
     * @expectedException \NumConverter\Exception\RuntimeException
     */
    public function testConversionFailsIfAppropriateConverterCannotBeResolved()
    {
        StaticConverter::convert('MMXV', NumeralSystems::ROMAN, NumeralSystems::HEXADECIMAL);
    }

    public static function getConversionsSet()
    {
        return array(
            array(100, NumeralSystems::DECIMAL, NumeralSystems::BINARY, '1100100'),
            array('1010', NumeralSystems::BINARY, NumeralSystems::HEXADECIMAL, 'a'),
            array('0FFFFFF', NumeralSystems::HEXADECIMAL, NumeralSystems::DECIMAL, 16777215),
            array('2015', NumeralSystems::DECIMAL, NumeralSystems::ROMAN, 'MMXV'),
            array('MCMLXXXVII', NumeralSystems::ROMAN, NumeralSystems::DECIMAL, 1987),
        );
    }
}
