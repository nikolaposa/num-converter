<?php
namespace NumConverter;

use NumConverter\Exception\UnknownNumeralSystemException;
use NumConverter\Exception\UnsupportedNumeralSystemException;
use NumConverter\Exception\RuntimeException;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
final class StaticConverter
{
    private static $converters = array(
        'NumConverter\NumberBasesConverter' => null,
        'NumConverter\DecimalRomanConverter' => null,
    );

    private function __construct()
    {
    }

    /**
     * @param mixed $number
     * @param string $fromSystem Numeral system of the number.
     * @param string $toSystem Numeral system into which number should be converted.
     * @return mixed
     * @throws UnsupportedNumeralSystemException
     */
    public static function convert($number, $fromSystem, $toSystem)
    {
        if (!NumeralSystems::exists($fromSystem)) {
            throw new UnknownNumeralSystemException("Unsupported system supplied for conversion: '$fromSystem'");
        }

        if (!NumeralSystems::exists($toSystem)) {
            throw new UnknownNumeralSystemException("Unsupported system supplied for conversion: '$toSystem'");
        }

        foreach (self::$converters as $converterClass => $converter) {
            if ($converter === null) {
                $converter = new $converterClass();
                self::$converters[$converterClass] = $converter;
            }

            try {
                return $converter->convert($number, $fromSystem, $toSystem);
            } catch (UnsupportedNumeralSystemException $ex) {
                continue;
            }
        }

        throw new RuntimeException("Number '$number' can not be converted from '$fromSystem' to '$toSystem' numeral system");
    }
}
