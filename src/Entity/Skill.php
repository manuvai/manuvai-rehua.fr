<?php

namespace App\Entity;

class Skill {
    public $name;
    public $category;
    public $text;
    public $style;
    public $imgSrc;

    public function __construct($name, $category = null, $text = null, $style = null, $imgSrc = null)
    {
        $this->name = $name;
        $this->category = $category;
        $this->text = $text;
        $this->style = $style;
        $this->imgSrc = $imgSrc;
    }
}
