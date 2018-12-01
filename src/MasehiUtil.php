<?php

namespace Masehi;

class MasehiUtil
{
    public function getExplicitMonths()
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
            '12' => 'Desember'
        );
    }

    public function getImplicitMonths()
    {
        return array(
            '1' => 'Jan',
            '2' => 'Feb',
            '3' => 'Mar',
            '4' => 'Apr',
            '5' => 'Mei',
            '6' => 'Jun',
            '7' => 'Jul',
            '8' => 'Agust',
            '9' => 'Sept',
            '10' => 'Okt',
            '11' => 'Nov',
            '12' => 'Des'
        );
    }

    public function getDays()
    {
        return array(
            '1' => 'Minggu',
            '2' => 'Senin',
            '3' => 'Selasa',
            '4' => 'Rabu',
            '5' => 'Kamis',
            '6' => 'Jumat',
            '7' => 'Sabtu'
        );
    }

    public function searchImplicitMonth($key)
    {
        $months = array(
            '1' => 'Jan',
            '2' => 'Feb',
            '3' => 'Mar',
            '4' => 'Apr',
            '5' => 'Mei',
            '6' => 'Jun',
            '7' => 'Jul',
            '8' => 'Ags',
            '9' => 'Sep',
            '10' => 'Okt',
            '11' => 'Nov',
            '12' => 'Des',
        );

        return $months[$key];
    }

    public function searchExplicitMonth($key)
    {
        $months = array(
            '1' => 'Januari',
            '2' => 'Februari' ,
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );

        return $months[$key];
    }

    public function searchDay($key)
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
}
