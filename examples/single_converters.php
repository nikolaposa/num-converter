<?php
require __DIR__ . '/../vendor/autoload.php';

use NumConverter\NumberBasesConverter;
use NumConverter\DecimalRomanConverter;
use NumConverter\NumeralSystems;

$numBasesConverter = new NumberBasesConverter();
echo '128 in Binary: ' . $numBasesConverter->convert(100, NumeralSystems::DECIMAL, NumeralSystems::BINARY) . "\n";
echo 'Binary 1010 in Hexadecimal: ' . $numBasesConverter->convert(100, NumeralSystems::BINARY, NumeralSystems::HEXADECIMAL);

echo "\n\n";

$decRomanConverter = new DecimalRomanConverter();
echo '2015 in Roman: ' . $decRomanConverter->convert(100, NumeralSystems::DECIMAL, NumeralSystems::ROMAN) . "\n";
echo 'MCMLXXXVII in Decimal: ' . $decRomanConverter->convert('MCMLXXXVII', NumeralSystems::ROMAN, NumeralSystems::DECIMAL);
