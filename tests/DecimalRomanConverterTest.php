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

use NumConverter\DecimalRomanConverter;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
class DecimalRomanConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DecimalRomanConverter
     */
    private $converter;

    protected function setUp()
    {
        $this->converter = new DecimalRomanConverter();
    }

    public function testSupportedSystemsRetrieval()
    {
        $supportedSystems = $this->converter->getSupportedSystems();

        $this->assertInternalType('array', $supportedSystems);
        $this->assertNotEmpty($supportedSystems);
    }

    /**
     * @dataProvider getDecimalRomanSet
     */
    public function testDecimalToRomanConversion($decimalNumber, $romanNumber)
    {
        $this->assertSame($romanNumber, $this->converter->convert($decimalNumber, 'dec', 'roman'));
    }

    /**
     * @dataProvider getRomanDecimalSet
     */
    public function testRomanToDecimalConversion($romanNumber, $decimalNumber)
    {
        $this->assertSame($decimalNumber, $this->converter->convert($romanNumber, 'roman', 'dec'));
    }

    /**
     * @expectedException \NumConverter\Exception\InvalidArgumentException
     */
    public function testDecimalToRomanConversionCannotConvertNonDigits()
    {
        $this->converter->convert('t3st', 'dec', 'roman');
    }

    /**
     * @expectedException \NumConverter\Exception\RuntimeException
     */
    public function testDecimalToRomanConversionCannotConvertTooLargeNumbers()
    {
        $this->converter->convert(100000, 'dec', 'roman');
    }

    /**
     * @expectedException \NumConverter\Exception\InvalidArgumentException
     */
    public function testRomanToDecimalConversionCannotConvertNonRomanLikeNumbers()
    {
        $this->converter->convert('xtestx', 'roman', 'dec');
    }

    public static function getDecimalRomanSet()
    {
        return array(
            array(100, 'C'),
            array(2015, 'MMXV'),
            array(23, 'XXIII'),
            array(277, 'CCLXXVII'),
            array(1987, 'MCMLXXXVII'),
            array(3024, 'MMMXXIV'),
            array(1573, 'MDLXXIII'),
            array(1234, 'MCCXXXIV'),
            array('732', 'DCCXXXII')
        );
    }

    public static function getRomanDecimalSet()
    {
        return array(
            array('MCMLXXXVII', 1987),
            array('MMXV', 2015),
            array('mmmxxiv', 3024),
            array('XXIII', 23),
            array('CCLXXVII', 277),
            array('MDLXXIII' , 1573),
            array('DCCXXIX', 729),
            array('dcccxc', 890),
            array('cccXLvii', 347)
        );
    }
}
