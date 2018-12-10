<?php

namespace Masehi;

class Util
{
    public static function explicitMonths()
    {
        return array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
    }

    public static function implicitMonths()
    {
        return array(
            '1' => 'Jan',
            '2' => 'Feb',
            '3' => 'Mar',
            '4' => 'Apr',
            '5' => 'Mei',
            '6' => 'Jun',
            '7' => 'Jul',
            '8' => 'Agst',
            '9' => 'Sept',
            '10' => 'Okt',
            '11' => 'Nov',
            '12' => 'Des',
        );
    }

    public static function implicitDaysByChar()
    {
        return array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu',
        );
    }

    public static function explicitDaysByChar()
    {
        return array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Satday' => 'Sabtu',
        );
    }

    public static function explicitDays()
    {
        return array(
            '1' => 'Minggu',
            '2' => 'Senin',
            '3' => 'Selasa',
            '4' => 'Rabu',
            '5' => 'Kamis',
            '6' => 'Jumat',
            '7' => 'Sabtu',
        );
    }

    public static function findDayByChar($key)
    {
        $days = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu',
        );

        return $days[$key];
    }

    public static function implicitMonthsByChar()
    {
        return array(
            'Jan' => 'Jan',
            'Feb' => 'Feb',
            'Mar' => 'Mar',
            'Apr' => 'Apr',
            'May' => 'Mei',
            'Jun' => 'Jun',
            'Jul' => 'Jul',
            'Aug' => 'Ags',
            'Sep' => 'Sep',
            'Oct' => 'Okt',
            'Nov' => 'Nov',
            'Dec' => 'Des',
        );
    }

    public static function explicitMonthsByChar()
    {
        return array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember',
        );
    }
}
