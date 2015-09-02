<?php
namespace NumConverter;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
final class NumeralSystems
{
    const DECIMAL = 'dec';
    const BINARY = 'bin';
    const OCTAL = 'oct';
    const HEXADECIMAL = 'hex';
    const ROMAN = 'roman';

    /**
     * @var array
     */
    private static $systems = null;

    private function __construct()
    {
    }

    /**
     * @return array
     */
    public static function getAll()
    {
        if (self::$systems === null) {
            $refl = new \ReflectionClass(__CLASS__);
            self::$systems = $refl->getConstants();
        }

        return self::$systems;
    }

    /**
     * @param string $numeralSystem
     * @return bool
     */
    public static function exists($numeralSystem)
    {
        return in_array($numeralSystem, self::getAll());
    }
}
