<?php

namespace App\Entity;

class Project {
    public $name;
    public $text;
    public $imgSrc;

    public function __construct($name, $text = null, $imgSrc = null)
    {
        $this->name = $name;
        $this->text = $text;
        $this->imgSrc = $imgSrc;
    }
}
