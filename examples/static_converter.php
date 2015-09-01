<?php
require __DIR__ . '/../vendor/autoload.php';

echo '100 in Roman: ' . NumConverter\StaticConverter::convert(100, NumConverter\NumeralSystems::DECIMAL, NumConverter\NumeralSystems::ROMAN) . "\n\n";

echo '2015 in Roman: ' . NumConverter\StaticConverter::convert(2015, NumConverter\NumeralSystems::DECIMAL, NumConverter\NumeralSystems::ROMAN) . "\n\n";

echo '111 in Decimal: ' . NumConverter\StaticConverter::convert('111', NumConverter\NumeralSystems::BINARY, NumConverter\NumeralSystems::DECIMAL) . "\n\n";

echo '0xFFFFFF in Decimal: ' . NumConverter\StaticConverter::convert('0xFFFFFF', NumConverter\NumeralSystems::HEXADECIMAL, NumConverter\NumeralSystems::DECIMAL) . "\n\n";

