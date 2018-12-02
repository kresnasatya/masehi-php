<?php
namespace Masehi;

class Helper
{
    // This is just a helper
    public static function getLocal($string, $array)
    {
        $local = '';
        foreach ($array as $key => $value) {
            if (strpos($string, $key) !== false) {
                $local = $array[$key];
            }
        }
        return $local;
    }

    // This is just a helper
    public static function getInternational($string, $array)
    {
        $international = '';
        foreach ($array as $key => $value) {
            if (strpos($string, $key) !== false) {
                $international = $key;
            }
        }
        return $international;
    }
}