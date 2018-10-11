<?php

namespace Masehi;

class Masehi
{

    public function searchImplicitMonth($value)
    {
        $months = array(
            'Jan' => 1,
            'Feb' => 2,
            'Mar' => 3,
            'Apr' => 4,
            'Mei' => 5,
            'Juni' => 6,
            'Jul' => 7,
            'Ags' => 8,
            'Sep' => 9,
            'Okt' => 10,
            'Nov' => 11,
            'Des' => 12
        );
        return array_search($value, $months);
    }

    public function searchExplicitMonth($value)
    {
        $months = array(
            'Januari' => 1,
            'Februari' => 2,
            'Maret' => 3,
            'April' => 4,
            'Mei' => 5,
            'Juni' => 6,
            'Juli' => 7,
            'Agustus' => 8,
            'September' => 9,
            'Oktober' => 10,
            'November' => 11,
            'Desember' => 12
        );
        return array_search($value, $months);
    }

    public function searchDay($value)
    {
        $days = array(
            'Minggu' => 'Sun',
            'Senin' => 'Mon',
            'Selasa' => 'Tue',
            'Rabu' => 'Wed',
            'Kamis' => 'Thu',
            'Jumat' => 'Fri',
            'Sabtu' => 'Sat'
        );
        return array_search($value, $days);
    }

    public function implicitDateConverter($value)
    {
        if (empty($value)) {
            return null;
        } elseif ($value == "Belum selesai") {
            $date = $value;
            return $date;
        } else {
            $dateTime = new DateTime($value);
            return $dateTime->format('d-m-Y');
        }
    }

    public function explicitDateConverter($value)
    {
        if (empty($value)) {
            return null;
        } elseif ($value == "Belum selesai") {
            return $value;
        } else {
            $dateTime = new DateTime($value);
            $day = $dateTime->format('d');
            $month = $this->searchExplicitMonth($dateTime->format('m'));
            $year = $dateTime->format('Y');
            return $day." ".$month." ".$year;
        }
    }

    public function implicitDateTimeConverter($value)
    {
        if (empty($value)) {
            return null;
        } elseif ($value == "Belum selesai") {
            return $value;
        } else {
            $date_format = new DateTime($value);
            return $date_format->format('d-m-Y H:i:s');
        }
    }

    public function explicitDateTimeConverter($value)
    {
        if (empty($value)) {
            return null;
        } elseif ($value == "Belum selesai") {
            return $value;
        } else {
            $date_format = new DateTime($value);
            $day = $date_format->format('d');
            $month = $this->searchExplicitMonth($date_format->format('m'));
            $year = $date_format->format('Y');
            $time = $date_format->format('H:i:s');
            return $this->dayConverter($value).", ". $day." ".$month." ".$year." ".$time;
        }
    }

    public function dayConverter($value)
    {
        if (empty($value) || $value == "Belum selesai") {
          return null;
        } else {
          $dateTime = new DateTime($value);
          return $this->searchDay($dateTime->format('D'));
        }
    }

    public function timeConverter($value)
    {
        if (empty($value)) {
          return null;
        } else {
          $dateTime = new DateTime($value);
          return $dateTime->format('H:i');
        }
    }

    public function timestampConverter($value)
    {
        if (empty($value)) {
            return null;
        } else {
            $dateTime = new DateTime($value);
            $day = $dateTime->format('d');
            $month = $this->searchImplicitMonth($dateTime->format('m'));
            $year = $dateTime->format('Y');
            $time = $dateTime->format('H:i:s');
            return $day." ".$month." ".$year." ".$time;
        }
    }

    // Mencetak tahun dengan format 4 digit
    public function parsingYear($value)
    {
        if (empty($value)) {
            return null;
        } else {
            try {
                $date = DateTime::createFromFormat('d-m-Y', $value);
                $year = $date->format('Y');
                // Check jika digit tahun yang telah dihilangkan '0' didepannya
                // kurang dari 4 digit
                if (strlen(ltrim($year, '0')) < 4) {
                    throw new Exception("Tahun harus 4 digit");
                    } else {
                            return $year;
                    }
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    public function parsingTwoDigitsYear($value)
    {
        if (empty($value)) {
            return null;
        } else {
            $dateTime = new DateTime($value);
            return $dateTime->format('y');
        }
    }

    public function parsingMonth($value)
    {
        if (empty($value)) {
            return null;
        } else {
            $dateTime = new DateTime($value);
            return $dateTime->format('m');
        }
    }

    public function parsingDate($value)
    {
        if (empty($value)) {
            return null;
        } else {
            try {
                $date = DateTime::createFromFormat('d-m-Y', $value);
                $year = $date->format('Y');
                if (strlen(ltrim($year, '0')) < 4) {
                    throw new Exception("Tahun harus 4 digit");
                    } else {
                            return $date->format('Y-m-d');
                    }
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    // TODO: Ugly method, fixed later
    public function parsingDatePart2($value)
    {
        if (empty($value)) {
            return null;
        } else {
            try {
                $dateTime = new DateTime($value);
                return $dateTime->format('Y-m-d');
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    public function parsingDateTime($value)
    {
        if (empty($value)) {
            return null;
        } else {
            $dateTime = new DateTime($value);
            return $dateTime->format('Y-m-d H:i');
        }
    }

    public function parsingTimestamp($value)
    {
        if (empty($value)) {
            return null;
        } else {
            $dateTime = new DateTime($value);
            return $dateTime->format('Y-m-d H:i');
        }
    }

    public function slashDateConverter($value)
    {
        $date = str_replace('/', '-', $value);
        return date('Y-m-d', strtotime($date));
    }


    public function checkFileType($value, $file_name, $allowed_mime_type)
    {
        if (isset($_FILES[$file_name]['name']) && $_FILES[$file_name]['name'] != "") {
            $count_file = count($_FILES[$file_name]['name']);
            for ($i = 0; $i < $count_file; $i++) {
                if (!empty($_FILES[$file_name]['tmp_name'][$i])) {
                    $mime = mime_content_type($_FILES[$file_name]['tmp_name'][$i]);
                    if (in_array($mime, $allowed_mime_type)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    }

    public function dateTimeWithoutSecondsConverter($value)
    {
        if (empty($value)) {
            return null;
        } elseif ($value == "Belum selesai") {
            return $value;
        } else {
            $date_format = new DateTime($value);
            $day = $date_format->format('d');
            $month = $this->searchExplicitMonth($date_format->format('m'));
            $year = $date_format->format('Y');
            $time = $date_format->format('H:i');
            return $day." ".$month." ".$year." ".$time;
        }
    }

    public function timeWithoutSecondsConverter($value)
    {
        if (empty($value)) {
            return null;
        } elseif ($value == "Belum selesai") {
            return $value;
        } else {
            $date_format = new DateTime($value);
            $time = $date_format->format('H:i');
            return $time;
        }
    }

    public function dateTimeConverter($value)
    {
        if (empty($value)) {
            return null;
        } elseif ($value == "Belum selesai") {
            return $value;
        } else {
            $date_format = new DateTime($value);
            return $date_format->format('d-m-Y H:i');
        }
    }
}
