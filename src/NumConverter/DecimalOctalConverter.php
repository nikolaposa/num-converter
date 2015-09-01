<?php
namespace NumConverter;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
final class DecimalOctalConverter extends BaseConverter
{
    public function getSupportedSystems()
    {
        return array(NumeralSystems::DECIMAL, NumeralSystems::OCTAL);
    }

    public function convert($number, $system)
    {
        if ($system == NumeralSystems::OCTAL) {
            return decoct((int) $number);
        }

        if ($system == NumeralSystems::DECIMAL) {
            return octdec((string) $number);
        }

        throw new UnsupportedNumeralSystemException("Unsupported system supplied for conversion: '$system'");
    }
}
