<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'experience';

    public function getDateLabel() {
        $d1 = new DateTime($this->start_date);
        $end_date = $this->end_date ?? date('Y-m-d');
        $d2 = new DateTime($end_date);

        $diff = $d1->diff($d2);

        if ($diff->y) {
            return $diff->y . ' an' . ($diff->y > 1 ? 's' : '');
        } else if ($diff->m) {
            return $diff->m . ' mois';
        }
        setlocale(LC_TIME, 'fr_FR');
        return date('Y', strtotime($this->start_date));

    }

    public function getDuration() {
        $d1 = new DateTime($this->start_date);
        $end_date = $this->end_date ?? date('Y-m-d');
        $d2 = new DateTime($end_date);

        $formattedDate1 = date('d F Y', strtotime($this->start_date));
        $formattedDate2 = date('d F Y', strtotime($end_date));

        $diff = $d1->diff($d2);

        if (!$diff->y && !$diff->m) {
            return $formattedDate1 . ' - ' . ($this->end_date ? $formattedDate2 : 'Aujourd\'ui');
        }

        $formattedDate1 = date('F Y', strtotime($this->start_date));
        $formattedDate2 = date('F Y', strtotime($end_date));

        return $formattedDate1 . ' - ' . ($this->end_date ? $formattedDate2 : 'Aujourd\'ui');
        
    }
}
