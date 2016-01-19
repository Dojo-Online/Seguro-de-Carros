<?php

namespace CarInsurance;

use CarInsurance\Client;
use CarInsurance\Contract;

class ContractTest extends \PHPUnit_Framework_TestCase
{
    public function testFemaleClientWithAgeUntil23AndWithCleanCNHShouldGain50PercentDiscount() {

        $client = new Client();
        $client
            ->setName('Bruna')
            ->setDocument(18287475851)
            ->setBirthDate((new \DateTime())->sub(new \DateInterval("P22Y")))
            ->setGender(Client::FEMALE);

        $contract = new Contract(123, $client);

        $this->assertEquals(50, $contract->getDiscount());
    }
}
