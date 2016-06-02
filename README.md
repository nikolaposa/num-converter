# Numbers converter

[![Build Status](https://travis-ci.org/nikolaposa/num-converter.svg?branch=master)](https://travis-ci.org/nikolaposa/num-converter)

PHP library which provides consistent interface for converting numbers between various numeral systems,
for example Binary, Hexadecimal, Roman, etc.

## Installation

The preferred method of installation is via [Composer](http://getcomposer.org/). Run the following
command to install the latest version of a package and add it to your project's `composer.json`:

```bash
composer require nikolaposa/num-converter
```

## Usage

```php
<?php
use NumConverter\StaticConverter as NumConverter;
use NumConverter\NumeralSystems;

echo NumConverter::convert(2015, NumeralSystems::DECIMAL, NumeralSystems::ROMAN); //MMXV

```

See [more examples](https://github.com/nikolaposa/num-converter/tree/master/examples).

## Author

**Nikola Poša**

* https://twitter.com/nikolaposa
* https://github.com/nikolaposa

## Copyright and license

Copyright 2016 Nikola Poša. Released under MIT License - see the `LICENSE` file for details.