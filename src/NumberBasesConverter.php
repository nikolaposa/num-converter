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

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
final class NumberBasesConverter extends AbstractConverter
{
    /**
     * @var array
     */
    private $systemBaseMap = array(
        NumeralSystems::DECIMAL => 10,
        NumeralSystems::BINARY => 2,
        NumeralSystems::OCTAL => 8,
        NumeralSystems::HEXADECIMAL => 16
    );

    /**
     * @return array
     */
    public function getSupportedSystems()
    {
        return array_keys($this->systemBaseMap);
    }

    /**
     * @param string $numeralSystem
     * @return int
     */
    private function systemToBase($numeralSystem)
    {
        return $this->systemBaseMap[$numeralSystem];
    }

    /**
     * @param mixed $number
     * @param string $fromSystem
     * @param string $toSystem
     * @return mixed
     */
    public function doConvert($number, $fromSystem, $toSystem)
    {
        $fromBase = $this->systemToBase($fromSystem);
        $toBase = $this->systemToBase($toSystem);

        $number = base_convert((string) $number, $fromBase, $toBase);

        if ($toSystem == NumeralSystems::DECIMAL) {
            $number = (int) $number;
        }

        return $number;
    }
}
