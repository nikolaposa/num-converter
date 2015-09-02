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

use NumConverter\Exception\InvalidArgumentException;
use NumConverter\Exception\RuntimeException;

/**
 * Converts numbers between Decimal and Roman numeral systems.
 *
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
final class DecimalRomanConverter extends AbstractConverter
{
    /**
     * @var array
     */
    private $basicNumbers = array(
        1 => 'I',
        5 => 'V',
        10 => 'X',
        50 => 'L',
        100 => 'C',
        500 => 'D',
        1000 => 'M'
    );

    /**
     * @return array
     */
    public function getSupportedSystems()
    {
        return array(NumeralSystems::DECIMAL, NumeralSystems::ROMAN);
    }

    /**
     * @param mixed $number
     * @param string $fromSystem
     * @param string $toSystem
     * @return mixed
     */
    public function doConvert($number, $fromSystem, $toSystem)
    {
        if ($toSystem == NumeralSystems::ROMAN) {
            return $this->dec2roman($number);
        }

        return $this->roman2dec($number);
    }

    /**
     * @param mixed $number
     * @return string
     */
    private function dec2roman($number)
    {
        if (!is_numeric($number) && !ctype_digit($number)) {
            throw new InvalidArgumentException("Non-decimal number supplied for conversion to Roman numeral system");
        }

        $number = (int) $number;

        if ($number >= 4000) {
            throw new RuntimeException('Numbers greater or equal to 4000 are not supported');
        }

        if (array_key_exists($number, $this->basicNumbers)) {
            return $this->basicNumbers[$number];
        }

        $romanNumber = '';

        $numberString = (string) $number;
        $numberLength = strlen($numberString);

        for ($i = 0; $i < $numberLength; $i++) {
            $currentNumber = (int) $numberString[$i];
            if ($currentNumber == 0) {
                continue;
            }

            $decPow = pow(10, ($numberLength - 1 - $i));

            switch ($currentNumber) {
                //4 and 9 are written using their higher base (5 or 10).
                case 4 :
                case 9 :
                    $romanNumber .= $this->basicNumbers[$decPow] . $this->basicNumbers[($currentNumber + 1) * $decPow];
                    break;
                case 6 :
                case 7 :
                case 8 :
                    $romanNumber .= $this->basicNumbers[5 * $decPow] . str_repeat($this->basicNumbers[$decPow], ($currentNumber - 5));
                    break;
                case 5 :
                    $romanNumber .= $this->basicNumbers[5 * $decPow];
                    break;
                default :
                    $romanNumber .= str_repeat($this->basicNumbers[$decPow], $currentNumber);
                    break;
            }
        }

        return $romanNumber;
    }

    /**
     * @param mixed $number
     * @return int
     */
    private function roman2dec($number)
    {
        $number = (string) $number;

        $number = trim($number);

        if (!preg_match('/^[' . implode('', array_values($this->basicNumbers)) . ']+$/i', $number)) {
            throw new InvalidArgumentException("Supplied Roman numeral: '$number' is not valid");
        }

        $number = strtoupper($number);

        $decNum = 0;

        if (($decNum = array_search($number, $this->basicNumbers)) !== false) {
            return $decNum;
        }

        $basicNumbers = array_flip($this->basicNumbers);

        $subtract = false;

        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $dn = $basicNumbers[$number[$i]];

            $prevPos = $i + 1;

            if (isset($number[$prevPos])) {
                $prevDn = $basicNumbers[$number[$prevPos]];

                if ($prevDn > $dn) { //Special pattern (IV, IX, CM, etc.)?
                    $decNum -= $dn;
                    $subtract = true;
                } elseif ($prevDn == $dn && $subtract) {
                    $decNum -= $dn;
                } else {
                    $decNum += $dn;
                    $subtract = false;
                }
            } else {
                $decNum += $dn;
            }
        }

        return $decNum;
    }
}
