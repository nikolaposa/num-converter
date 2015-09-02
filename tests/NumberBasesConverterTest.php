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

use NumConverter\NumberBasesConverter;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
class NumberBasesConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NumberBasesConverter
     */
    private $converter;

    protected function setUp()
    {
        $this->converter = new NumberBasesConverter();
    }

    public function testSupportedSystemsRetrieval()
    {
        $supportedSystems = $this->converter->getSupportedSystems();

        $this->assertInternalType('array', $supportedSystems);
        $this->assertNotEmpty($supportedSystems);
    }

    /**
     * @dataProvider getConversionsSet
     */
    public function testConversions($number, $from, $to, $expected)
    {
        $this->assertSame($expected, $this->converter->convert($number, $from, $to));
    }

    public static function getConversionsSet()
    {
        return array(
            array(100, 'dec', 'bin', '1100100'),
            array('128', 'dec', 'bin', '10000000'),
            array(7, 'hex', 'bin', '111'),
            array(7, 'hex', 'dec', 7),
            array(2015, 'dec', 'hex', '7df'),
            array(23, 'dec', 'oct', '27'),
        );
    }
}
