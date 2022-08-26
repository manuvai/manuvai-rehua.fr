<?php

namespace App\Helper;

class DateHelper {
    public static function displayDiff($date1, $date2) {
        $startDate = date_create($date1);
        $endDate = date_create($date2);
        
        $interval = date_diff($startDate, $endDate);
        $months = $interval->format('%m');
        $years = $interval->format('%y');

        $response = "";

        if (!empty($years)) {
            $response = $years;
            $response.= " an" . ($years > 1 ? 's' : '') . ' ';
        }

        if ($months && $years) {
            $response .= sprintf("et %s mois", $months);
        } else if ($months) {
            $response .= sprintf("%s mois", $months);

        }

        return $response;
    }
}

