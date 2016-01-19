<?php

namespace CarInsurance;

use CarInsurance\Client;
use CarInsurance\Contract;

class ClientTest extends \PHPUnit_Framework_TestCase
{

    // Requisito 1
    public function testClientShouldHaveAttributes()
    {
        $client = new Client();
        $client
            ->setName('Bruno')
            ->setDocument('03487624819')
            ->setBirthdate(new \DateTime('1995-01-25'))
            ->setHomeNumber('34349285')
            ->setPhoneNumber('94349285')
            ->setEmail('brunomrpx@gmail.com')
            ->setMaritalStatus('Single')
            ->setContract(new Contract(123123123));

        $this->assertTrue($client instanceof Client);
    }

    public function testAgeBetween18And60ShouldBeValid()
    {
        $birthdate = new \DateTime(); // now
        $birthdate->sub(new \DateInterval("P18Y")); // 18 years ago
        $client = new Client('Bilu', '03487624819', $birthdate);

        $birthdate = new \DateTime(); // now
        $birthdate->sub(new \DateInterval("P60Y")); // 60 years ago
        $client = new Client('Bilu', '03487624819', $birthdate);
    }

    /**
     * @expectedException        InvalidClientException
     * @expectedExceptionMessage Client age should be between 18 and 60
     */
    public function testAgeLessThan18ShouldBeInvalid()
    {
        $birthdate = new \DateTime(); // now
        $birthdate->sub(new \DateInterval("P17Y")); // 17 years ago
        $client = new Client('Bilu', '03487624819', $birthdate);
    }
}
