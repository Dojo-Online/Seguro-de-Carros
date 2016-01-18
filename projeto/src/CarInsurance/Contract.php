<?php

namespace CarInsurance;

class Contract {
    private $number;

    function __construct($number) {
        $this->setNumber($number);
    }

    public function setNumber($number) {
        return $this;
    }
}
