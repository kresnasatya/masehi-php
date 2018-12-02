<?php
require 'vendor/autoload.php';

use Masehi\Converter as MasehiConverter;

$masehi = new MasehiConverter;

echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "d M Y",
));
echo "\n";
echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "d F Y",
));
echo "\n";
echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "D, d F Y",
));
echo "\n";
echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "l, d F Y",
));
echo "\n";
echo $masehi->convertDate(array(
  "date" => "2013/08/25",
  "format" => "l, d M Y",
));
echo "\n";