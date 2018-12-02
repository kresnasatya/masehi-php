# Masehi PHP

A library for convert date to Indonesia language, convert time based on timezone and validate date and time

## Installation

Download [composer.phar](http://getcomposer.org/composer.phar) if you don't have one. Then run it from terminal.

```bash
php composer.phar require "satyakresna/masehi: *"
```

Or, you can put into your `composer.json` file.

```json
"require": {
  "satyakresna/masehi": "*"
}
```

Then run composer update

```bash
php composer.phar update
```

## Usage

By default this library will convert date to Indonesia date automatically. If you wish to denied it, simply. Just set param `"is_local"` to false.

```php
<?php
require 'vendor/autoload.php';

use Masehi\Converter as MasehiConverter;

$masehi = new MasehiConverter;

# Denied convert to local
echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "l, d M Y",
  "is_local" => false,
));
echo "\n";
# Output: Sunday, 25 Aug 2013

echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "d M Y",
));
echo "\n";
# Output: 25 Ags 2013

echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "d F Y",
));
echo "\n";
# Output: 25 Agustus 2013

echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "D, d F Y",
));
echo "\n";
# Output: Minggu, 25 Agustus 2013

echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "l, d M Y",
));
echo "\n";
# Output: Minggu, 25 Ags 2013
```
