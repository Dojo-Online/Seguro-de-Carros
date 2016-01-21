<?php

namespace CarInsurance;

use CarInsurance\Client;

class Contract
{
    private $number;
    private $client;

    public function __construct($number, Client $client)
    {
        $this->setNumber($number);
        $this->setClient($client);
    }

    private function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    private function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getDiscount()
    {
        $client = $this->getClient();
        if ($client->getGender() == $client::FEMALE) {
            $age = $client->getAge();
            if ($age <= 23 && !$client->getCNHPoints()) {
                return 50;
            }

            if ($age > 30 && $client->getMaritalStatus() == Client::SINGLE && $client->getCNHPoints() == 0) {
                return 10;
            }

            if ($age > 23 && $client->getMaritalStatus() == Client::MARRIED) {
                return 20;
            }
        }
        return 0;
    }
}
