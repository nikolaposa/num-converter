<?php
namespace NumConverter;

use NumConverter\Exception\UnsupportedNumeralSystemException;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
interface Converter
{
    /**
     * Gets numeral systems supported by this convertor.
     *
     * @return array
     */
    public function getSupportedSystems();

    /**
     * @param mixed $number
     * @param string $fromSystem Numeral system of the number.
     * @param string $toSystem Numeral system into which number should be converted.
     * @return mixed
     * @throws UnsupportedNumeralSystemException
     */
    public function convert($number, $fromSystem, $toSystem);
}
