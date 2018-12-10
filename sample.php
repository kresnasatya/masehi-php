<?php
require 'vendor/autoload.php';

use Masehi\Converter as MasehiConverter;
use Masehi\Util;

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

# Use Util class to display list of local month
print_r(Util::implicitMonths());
echo "\n";

print_r(Util::explicitMonths());
echo "\n";