<?php

namespace CarInsurance\Validator;

Interface Validator {
    public function validate(Validable $validable);
}
