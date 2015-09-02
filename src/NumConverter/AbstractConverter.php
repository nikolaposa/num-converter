<?php
namespace NumConverter;

use NumConverter\Exception\UnsupportedNumeralSystemException;
use NumConverter\Exception\InvalidArgumentException;

/**
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
abstract class AbstractConverter implements Converter
{
    /**
     * @param mixed $number
     * @param string $fromSystem
     * @param string $toSystem
     * @return mixed
     * @throws UnsupportedNumeralSystemException
     * @throws InvalidArgumentException
     */
    public function convert($number, $fromSystem, $toSystem)
    {
        $supportedSystems = $this->getSupportedSystems();

        if (!in_array($fromSystem, $supportedSystems)) {
            throw new UnsupportedNumeralSystemException(__CLASS__ . " does not support '$fromSystem' numeral system");
        }

        if (!in_array($toSystem, $supportedSystems)) {
            throw new UnsupportedNumeralSystemException(__CLASS__ . " does not support '$toSystem' numeral system");
        }

        if ($fromSystem === $toSystem) {
            throw new InvalidArgumentException("Same numeral system supplied for both current and target systems");
        }

        return $this->doConvert($number, $fromSystem, $toSystem);
    }

    /**
     * @param mixed $number
     * @param string $toSystem
     * @return mixed
     */
    abstract protected function doConvert($number, $fromSystem, $toSystem);
}
