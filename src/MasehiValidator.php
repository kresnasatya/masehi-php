<?php

namespace Masehi;

class MasehiValidator
{
    public function checkDateFormat($value, $strict = true)
    {
        $date = DateTime::createFromFormat('d-m-Y', $value);
        if ($strict) {
            $errors = DateTime::getLastErrors();
            if (!empty($errors['warning_count'])) {
                return false;
            }
        }
        return $date !== false;
    }

    public function checkDateTimeFormat($value, $strict = true)
    {
        $dateTime = DateTime::createFromFormat('d-m-Y H:i', $value);
        if ($strict) {
            $errors = DateTime::getLastErrors();
            if (!empty($errors['warning_count'])) {
                return false;
            }
        }
        return $dateTime !== false;
    }

    public function validateTwentyFourHour($time)
    {
        return preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $time);
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
