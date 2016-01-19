<?php

namespace CarInsurance;

class Client
{
    private $name;
    private $document;
    private $birthdate;
    private $phoneNumber;
    private $homeNumber;
    private $email;
    private $maritalStatus;

    public function setName($name)
    {
        return $this;
    }

    public function setDocument($document)
    {
        return $this;
    }

    public function setBirthdate(\Datetime $birthdate)
    {
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
}
