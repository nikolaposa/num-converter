<?php
namespace NumConverter;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
final class NumeralSystems
{
    const DECIMAL = 'decimal';
    const BINARY = 'binary';
    const OCTAL = 'octal';
    const HEXADECIMAL = 'hexadecimal';
    const ROMAN = 'roman';

    private function __construct()
    {
    }

    public static function exists($numeralSystem)
    {
        $refl = new \ReflectionClass(__CLASS__);

        return in_array($numeralSystem, $refl->getConstants());
    }
}
