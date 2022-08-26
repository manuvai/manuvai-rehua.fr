<?php

namespace App\Entity;

use App\Helper\DateHelper;

class Experience {
    public $name;
    public $start_date;
    public $end_date;
    public $employer;
    public $description;
    public $type;

    public function __construct($name, $start_date, $end_date, $employer, $description, $type)
    {
        $this->name = $name;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->employer = $employer;
        $this->description = $description;
        $this->type = $type;
    }

    public function getDateLabel() {
        return DateHelper::displayDiff($this->start_date, $this->end_date);
    }
}
