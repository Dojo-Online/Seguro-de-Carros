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
    private $cnhPoints = 0;

    const MALE = 'M';
    const FEMALE = 'F';

    const SINGLE = 'S';
    const MARRIED = 'M';

    public function __construct($name, $document, \DateTime $birthdate, $gender)
    {
        $this
            ->setName($name)
            ->setDocument($document)
            ->setBirthdate($birthdate)
            ->setGender($gender);

        return $this;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function getGender()
    {
        return $this->gender;
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
        $this->document = $document;
        return $this;
    }

    public function setBirthdate(\DateTime $birthdate)
    {
        if (!$this->isValidAge($birthdate)) {
            throw new InvalidClientException("Client age should be between 18 and 60");
        }
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getAge()
    {
        return $this->birthdate->diff(new \DateTime)->format('%Y');
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
        $this->maritalStatus = $maritalStatus;
        return $this;
    }

    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    public function setCNHPoints($cnhPoints)
    {
        $this->cnhPoints = $cnhPoints;
        return $this;
    }

    public function getCNHPoints()
    {
        return $this->cnhPoints;
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
