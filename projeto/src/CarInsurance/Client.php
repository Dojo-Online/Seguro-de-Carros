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

    public function __construct()
    {
        if (func_num_args() === 3) {
            $this->__constructNameDocumentBirthdate(func_get_arg(0), func_get_arg(1), func_get_arg(2));
        }
    }

    /**
     * Overloaded constructor
     */
    private function __constructNameDocumentBirthdate($name, $document, \Datetime $birthdate)
    {
        $this
            ->setName($name)
            ->setDocument($document)
            ->setBirthdate($birthdate);

        return $this;
    }

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
        $now = new \DateTime();
        $interval = $now->diff($birthdate);
        if ($interval->y < 18) {
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
}
