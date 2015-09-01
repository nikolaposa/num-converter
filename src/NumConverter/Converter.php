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
     * Tells whether converter is capable of handling conversion between some systems.
     *
     * @param array $systems
     * @return bool
     */
    public function canHandle(array $systems);

    /**
     * @param mixed $number
     * @param string $system Numeral system into which number should be converted.
     * @return mixed
     * @throws UnsupportedNumeralSystemException
     */
    public function convert($number, $system);
}
