<?php
require __DIR__ . '/../vendor/autoload.php';

use NumConverter\StaticConverter as NumConverter;
use NumConverter\NumeralSystems;

echo 'Binary 111 in Decimal: ' . NumConverter::convert('111', NumeralSystems::BINARY, NumeralSystems::DECIMAL) . "\n\n";

echo '0xFFFFFF in Decimal: ' . NumConverter::convert('0xFFFFFF', NumeralSystems::HEXADECIMAL, NumeralSystems::DECIMAL) . "\n\n";

echo '100 in Roman: ' . NumConverter::convert(100, NumeralSystems::DECIMAL, NumeralSystems::ROMAN) . "\n\n";

echo '2015 in Roman: ' . NumConverter::convert(2015, NumeralSystems::DECIMAL, NumeralSystems::ROMAN) . "\n\n";
