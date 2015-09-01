<?php
namespace NumConverter;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
final class DecimalBinaryConverter extends BaseConverter
{
    public function getSupportedSystems()
    {
        return array(NumeralSystems::DECIMAL, NumeralSystems::BINARY);
    }

    public function convert($number, $system)
    {
        if ($system == NumeralSystems::BINARY) {
            return decbin((int) $number);
        }

        if ($system == NumeralSystems::DECIMAL) {
            return bindec((string) $number);
        }

        throw new UnsupportedNumeralSystemException("Unsupported system supplied for conversion: '$system'");
    }
}
