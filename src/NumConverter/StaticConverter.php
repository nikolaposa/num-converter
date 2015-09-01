<?php
namespace NumConverter;

use NumConverter\Exception\UnsupportedNumeralSystemException;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
final class StaticConverter
{
    private static $converters = array(
        'NumConverter\DecimalBinaryConverter' => null,
        'NumConverter\DecimalOctalConverter' => null,
        'NumConverter\DecimalHexadecimalConverter' => null,
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
            throw new UnsupportedNumeralSystemException("Unsupported system supplied for conversion: '$fromSystem'");
        }

        if (!NumeralSystems::exists($toSystem)) {
            throw new UnsupportedNumeralSystemException("Unsupported system supplied for conversion: '$toSystem'");
        }

        foreach (self::$converters as $converterClass => $converter) {
            if ($converter === null) {
                $converter = new $converterClass();
                self::$converters[$converterClass] = $converter;
            }

            if ($converter->canHandle(array($fromSystem, $toSystem))) {
                return $converter->convert($number, $toSystem);
            }
        }

        throw new UnsupportedNumeralSystemException("Unsupported system supplied for conversion");
    }
}
