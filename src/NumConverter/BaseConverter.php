<?php
namespace NumConverter;

/**
 *
 * @author Nikola Posa <posa.nikola@gmail.com>
 */
abstract class BaseConverter implements Converter
{
    /**
     * Tells whether converter is capable of handling conversion between some systems.
     *
     * @param array $systems
     * @return bool
     */
    public function canHandle(array $systems)
    {
        return (count(array_diff($systems, $this->getSupportedSystems())) == 0);
    }
}
