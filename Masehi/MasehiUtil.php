<?php

namespace Masehi;

class MasehiUtil
{
    public function getMonths()
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

    public function compareDate($start_date, $end_date)
    {
        $start_date = $this->parsingDate($start_date);
        $end_date = $this->parsingDate($end_date);
        if ($end_date >= $start_date || $end_date == $start_date) {
            return true;
        } else {
            return false;
        }
    }
    public function compareDateTime($start_datetime, $end_datetime)
    {
        if ($end_datetime > $start_datetime) {
            return true;
        } else {
            return false;
        }
    }
}
