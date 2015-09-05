# Numbers converter

[![Build Status](https://travis-ci.org/nikolaposa/num-converter.svg?branch=master)](https://travis-ci.org/nikolaposa/num-converter)

PHP library which provides consistent interface for converting numbers between various numeral systems,
for example Binary, Hexadecimal, Roman, etc.

## Installation

Install the library using [composer](http://getcomposer.org/). Add the following to your `composer.json`:

```json
{
    "require": {
        "nikolaposa/num-converter": "1.*"
    }
}
```

Tell composer to download NumConverter by running `install` command:

```bash
$ php composer.phar install
```

## Usage

```php
<?php
use NumConverter\StaticConverter as NumConverter;
use NumConverter\NumeralSystems;

echo NumConverter::convert(2015, NumeralSystems::DECIMAL, NumeralSystems::ROMAN); //MMXV

```

See [more examples](https://github.com/nikolaposa/num-converter/tree/master/examples).
