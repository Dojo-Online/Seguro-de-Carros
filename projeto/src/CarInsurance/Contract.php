<?php

namespace CarInsurance;

class Contract
{
    private $number;

    public function __construct($number)
    {
        $this->setNumber($number);
    }

    public function setNumber($number)
    {
        return $this;
    }

    public function getDiscount()
    {
        return 50;
    }
}
