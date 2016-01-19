<?php

namespace CarInsurance;

use CarInsurance\Exception\InvalidClientException;

class Client
{
    private $name;
    private $document;
    private $birthdate;
    private $phoneNumber;
    private $homeNumber;
    private $email;
    private $maritalStatus;
    private $gender;

    const MALE = 'M';
    const FEMALE = 'F';

    public function __construct()
    {
        if (func_num_args() === 3) {
            $this->__constructNameDocumentBirthdate(func_get_arg(0), func_get_arg(1), func_get_arg(2));
        }
    }

    /**
     * Overloaded constructor
     */
    private function __constructNameDocumentBirthdate($name, $document, \DateTime $birthdate)
    {
        $this
            ->setName($name)
            ->setDocument($document)
            ->setBirthdate($birthdate);

        return $this;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function setName($name)
    {
        $name = trim($name);
        if (!$this->isValidName($name)) {
            throw new InvalidClientException("Client name length should be less than 15 without numbers or special chars");
        }
        $this->name = $name;
        return $this;
    }

    public function setDocument($document)
    {
        if (!$this->isValidDocument($document)) {
            throw new InvalidClientException("Client document should be a numeric with 11 characters");
        }
        return $this;
    }

    public function setBirthdate(\DateTime $birthdate)
    {
        if (!$this->isValidAge($birthdate)) {
            throw new InvalidClientException("Client age should be between 18 and 60");
        }
        return $this;
    }

    public function setHomeNumber($homeNumber)
    {
        return $this;
    }

    public function setPhoneNumber($phoneNumber)
    {
        return $this;
    }

    public function setEmail($email)
    {
        return $this;
    }

    public function setMaritalStatus($maritalStatus)
    {
        return $this;
    }

    public function setContract(Contract $contract)
    {
        return $this;
    }

    private function isValidAge(\DateTime $birthdate)
    {
        $now = new \DateTime();
        $interval = $now->diff($birthdate);
        return $interval->y >= 18 && $interval->y <= 60;
    }

    private function isValidName($name)
    {
        return (bool)preg_match("/^[a-z]{2}[a-z ]{0,13}$/i", $name);
    }

    private function isValidDocument($document)
    {
        return is_numeric($document) && (strlen($document) == 11);
    }
}
