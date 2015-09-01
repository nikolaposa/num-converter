<?php
namespace NumConverter;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
final class DecimalHexadecimalConverter extends BaseConverter
{
    public function getSupportedSystems()
    {
        return array(NumeralSystems::DECIMAL, NumeralSystems::HEXADECIMAL);
    }

    public function convert($number, $system)
    {
        if ($system == NumeralSystems::HEXADECIMAL) {
            return dechex((int) $number);
        }

        if ($system == NumeralSystems::DECIMAL) {
            return hexdec((string) $number);
        }

        throw new UnsupportedNumeralSystemException("Unsupported system supplied for conversion: '$system'");
    }
}
