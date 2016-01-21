<?php

namespace CarInsurance;

use CarInsurance\Client;
use CarInsurance\Contract;

class ContractTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateNewContract()
    {
        $client = new Client("Bruno", 18287475851, (new \DateTime())->sub(new \DateInterval("P22Y")), Client::MALE);
        $contract = new Contract(123, $client);

        $this->assertInstanceOf('CarInsurance\Contract', $contract);
    }

    public function testFemaleClientWithAgeUntil23AndWithCleanCNHShouldGain50PercentDiscount()
    {

        $client = new Client("Bruna", 18287475851, (new \DateTime())->sub(new \DateInterval("P22Y")), Client::FEMALE);

        $contract = new Contract(123, $client);

        $this->assertEquals(50, $contract->getDiscount());
    }

    //6º - Se for sexo do feminino 20% de desconto se: Idade for acima de 23 anos e Estado Civil Casada
    public function testFemaleClientWithAgeGreaterThan23AndMarriedShouldGain20PercentDiscount()
    {
        $client = new Client('Bruna Santos', 18287475851, (new \DateTime())->sub(new \DateInterval("P24Y")), Client::FEMALE);
        $client->setMaritalStatus(Client::MARRIED);
        $contract = new Contract(123, $client);

        $this->assertEquals(20, $contract->getDiscount());
    }

    //7º - Se for sexo do feminino 10% de desconto se: Idade for acima de 30 anos e Estado Civil Solteira e CNH sem pontuação;
    public function testFemaleClientWithAgeGreaterThan30SingleAndCnhWhitNoPointsGain10PercentDiscount()
    {
        $client = new Client('Bruna Santos', 18287475851, (new \DateTime())->sub(new \DateInterval("P31Y")), Client::FEMALE);
        $client->setMaritalStatus(Client::SINGLE);

        $contract = new Contract(1, $client);
        $this->assertEquals(10, $contract->getDiscount());
    }

    public function testMaleClientShouldNotHaveDiscount()
    {
        $client = new Client('Jose Silva', 18287475851, (new \DateTime())->sub(new \DateInterval("P31Y")), Client::MALE);

        $contract = new Contract(1, $client);
        $this->assertEquals(0, $contract->getDiscount());
    }

    public function testFemaleClientWithCnhPointsShouldNotHaveDiscount()
    {
        $client = new Client('Maria Claudia', 18287475851, (new \DateTime())->sub(new \DateInterval("P18Y")), Client::FEMALE);
        $client->setCNHPoints(20);

        $contract = new Contract(1, $client);
        $this->assertEquals(0, $contract->getDiscount());
    }

    public function testFemaleClientSingleWhithAgeBetween24And32ShouldNotHaveDiscount()
    {
        $client = new Client('Maria Claudia', 18287475851, (new \DateTime())->sub(new \DateInterval("P27Y")), Client::FEMALE);
        $client->setMaritalStatus(Client::SINGLE);

        $contract = new Contract(1, $client);
        $this->assertEquals(0, $contract->getDiscount());
    }

    public function testFemaleClientWithAgeGreaterThan30SingleWhithCnhPointsShouldNotHaveDiscount()
    {
        $client = new Client('Bruna Santos', 18287475851, (new \DateTime())->sub(new \DateInterval("P36Y")), Client::FEMALE);
        $client->setMaritalStatus(Client::SINGLE);
        $client->setCNHPoints(20);

        $contract = new Contract(1, $client);
        $this->assertEquals(0, $contract->getDiscount());
    }

}
