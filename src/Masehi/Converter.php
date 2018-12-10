<?php

namespace Masehi;

use Masehi\Util as Util;
use Masehi\Helper;

class Converter
{   
    /**
     * The purpose of this method is to convert date to local date by default.
     * If you wish to denied to convert date to local date just set "is_local" = false
     * $params = array(
     *  "date" => (required),
     *  "format" => (required),
     *  "is_local" => (optional),
     * );
     * 
     * For format please check this site: https://www.w3schools.com/php/func_date_date_format.asp
     */
    public static function convertDate($params)
    {   
        try {
            if (!isset($params["date"]) || !isset($params["format"])) {
                throw new \Exception("Pastikan Anda memasang key date dan format. \n");
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        try {
            $date = date_create($params["date"]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $formatted_date = date_format($date, $params["format"]);

        try {
            if (!$formatted_date) {
                throw new \Exception("Pastikan format yang Anda masukkan benar. \n");
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        if (isset($params["is_local"]) && !$params["is_local"]) {
            return $formatted_date;
        } else {
            # l (lowercase 'L') - A full textual representation of a day
            # M - A short textual representation of a month (three letters)
            # F - A full textual representation of a month (January through December)
            # D - A textual representation of a day (three letters)
            $checklFormat = (strpos($params["format"], "l") !== false) ? true : false;
            $checkFFormat = (strpos($params["format"], "F") !== false) ? true : false;
            $checkDFormat = (strpos($params["format"], "D") !== false) ? true : false;
            $checkMFormat = (strpos($params["format"], "M") !== false) ? true : false;

            if ($checklFormat) {
                $days = Util::explicitDaysByChar();
                $internationalDay = Helper::getInternational($formatted_date, $days);
                $localDay = Helper::getLocal($formatted_date, $days);
                $formatted_date = str_replace($internationalDay, $localDay, $formatted_date);
            }

            if ($checkDFormat) {
                $days = Util::implicitDaysByChar();
                $internationalDay = Helper::getInternational($formatted_date, $days);
                $localDay = Helper::getLocal($formatted_date, $days);
                $formatted_date = str_replace($internationalDay, $localDay, $formatted_date);
            }

            if ($checkFFormat) {
                $months = Util::explicitMonthsByChar();
                $internationalMonth = Helper::getInternational($formatted_date, $months);
                $localMonth = Helper::getLocal($formatted_date, $months);
                $formatted_date = str_replace($internationalMonth, $localMonth, $formatted_date);
            }

            if ($checkMFormat) {
                $months = Util::implicitMonthsByChar();
                $internationalMonth = Helper::getInternational($formatted_date, $months);
                $localMonth = Helper::getLocal($formatted_date, $months);
                $formatted_date = str_replace($internationalMonth, $localMonth, $formatted_date);
            }

            return $formatted_date;
        }
    }
}
