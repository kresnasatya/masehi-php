# Masehi PHP

[![Latest Stable Version](https://poser.pugx.org/satyakresna/masehi/v/stable)](https://packagist.org/packages/satyakresna/masehi)
[![Total Downloads](https://poser.pugx.org/satyakresna/masehi/downloads)](https://packagist.org/packages/satyakresna/masehi)
[![Latest Unstable Version](https://poser.pugx.org/satyakresna/masehi/v/unstable)](https://packagist.org/packages/satyakresna/masehi)
[![License](https://poser.pugx.org/satyakresna/masehi/license)](https://packagist.org/packages/satyakresna/masehi)

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

Or, the **simple way** is go to your root project via terminal or cmd and run this command

```
composer require satyakresna/masehi
```

## Usage

By default this library will convert date to Indonesia date automatically. If you wish to deny, simply, just set param `"is_local"` to false.

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
  "format" => "l, d M Y",
));
echo "\n";
# Output: Minggu, 25 Ags 2013

# Or using static method
echo MasehiConverter::convertDate(array(
  "date" => "now",
  "format" => "l, d M Y",
  "is_local" => false,
));
echo "\n";
# Output: Sunday, 02 Dec 2018

echo MasehiConverter::convertDate(array(
  "date" => "now",
  "format" => "l, d M Y"
));
echo "\n";
# Output: Minggu, 02 Des 2018
```

You can also use `Util` class to display list of month on your select dropdown of your system (maybe).

```php
<?php
require 'vendor/autoload.php';

use Masehi\Util;
# Use Util class to display list of local month
print_r(Util::implicitLocalMonths());
echo "\n";

print_r(Util::explicitLocalMonths());
echo "\n";

# Those are will output list of implicit local months and explicit local months
```

## Things on progress

- [ ] Convert time based on timezone
- [ ] Create validator date and time format
- [ ] Create contextual output date and time (ex. 15 jam yang lalu)

## How can I contribute?

For a moment I don't received pull request because I want to build this architecture solid.
After that I will let you to help me to pull request via code. If just readme, it's fine!
Another things to contribute:

1. **USE THIS LIBRARY. IT'S A MUST!**
2. Star the repo
3. Tell your friends about this awesome library
4. Drop an issue if you face a problem
