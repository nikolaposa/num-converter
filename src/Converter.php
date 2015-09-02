<?php
/**
 * This file is part of the NumConverter package.
 *
 * Copyright (c) Nikola Posa <posa.nikola@gmail.com>
 *
 * For full copyright and license information, please refer to the LICENSE file,
 * located at the package root folder.
 */

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
