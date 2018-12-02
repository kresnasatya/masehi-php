<?php

namespace Masehi;

use Masehi\Util as Util;

class Converter
{   
    # 1. Params (array) => date (required), format (required), is_local (default true), timezone (default null) 
    # 2. Implement try and catch to throw error if key in params like date and format is not exists.
    public static function convert($params)
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
                $util = new Util;
                $days = $util->explicitLocalDaysByChar();

                $internationalDay = '';
                $localDay = '';
                $string = $formatted_date;
                foreach ($days as $key => $day) {
                    if (strpos($string, $key) !== false) {
                        $internationalDay = $key;
                        $localDay = $days[$key];
                    }
                }

                $formatted_date = str_replace($internationalDay, $localDay, $formatted_date);
            }

            if ($checkDFormat) {
                $util = new Util;
                $days = $util->implicitLocalDaysByChar();

                $internationalDay = '';
                $localDay = '';
                $string = $formatted_date;
                foreach ($days as $key => $day) {
                    if (strpos($string, $key) !== false) {
                        $internationalDay = $key;
                        $localDay = $days[$key];
                    }
                }

                $formatted_date = str_replace($internationalDay, $localDay, $formatted_date);
            }

            if ($checkFFormat) {
                $util = new Util;
                $months = $util->explicitLocalMonthsByChar();

                $internationalMonth = '';
                $localMonth = '';
                $string = $formatted_date;
                foreach ($months as $key => $month) {
                    if (strpos($string, $key) !== false) {
                        $internationalMonth = $key;
                        $localMonth = $months[$key];
                    }
                }

                $formatted_date = str_replace($internationalMonth, $localMonth, $formatted_date);
            }

            if ($checkMFormat) {
                $util = new Util;
                $months = $util->implicitLocalMonthsByChar();

                $internationalMonth = '';
                $localMonth = '';
                $string = $formatted_date;
                foreach ($months as $key => $month) {
                    if (strpos($string, $key) !== false) {
                        $internationalMonth = $key;
                        $localMonth = $months[$key];
                    }
                }

                $formatted_date = str_replace($internationalMonth, $localMonth, $formatted_date);
            }

            return $formatted_date;
        }
    }
}
