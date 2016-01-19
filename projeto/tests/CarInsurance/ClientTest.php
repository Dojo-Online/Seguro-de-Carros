<?php

namespace CarInsurance;

use CarInsurance\Client;
use CarInsurance\Contract;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private function clientBuilder($name, $document, \DateTime $birthdate)
    {
        return new Client($name, $document, $birthdate);
    }

    // Requisito 1
    public function testClientShouldHaveAttributes()
    {
        $client = new Client();
        $client
            ->setName('Bruno')
            ->setDocument('03487624819')
            ->setBirthdate((new \DateTime())->sub(new \DateInterval("P20Y"))) // 20 years old
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
     * @expectedException        CarInsurance\Exception\InvalidClientException
     * @expectedExceptionMessage Client age should be between 18 and 60
     */
    public function testAgeLessThan18ShouldBeInvalid()
    {
        $birthdate = new \DateTime(); // now
        $birthdate->sub(new \DateInterval("P17Y")); // 17 years ago
        $client = new Client('Bilu', '03487624819', $birthdate);
    }

    /**
     * @expectedException        CarInsurance\Exception\InvalidClientException
     * @expectedExceptionMessage Client age should be between 18 and 60
     */
    public function testAgeGreaterThan60ShouldBeInvalid()
    {
        $birthdate = new \DateTime(); // now
        $birthdate->sub(new \DateInterval("P61Y")); // 61 years ago
        $client = new Client('Bilu', '03487624819', $birthdate);
    }

    /**
     * @expectedException        CarInsurance\Exception\InvalidClientException
     * @expectedExceptionMessage Client name length should be less than 15 without numbers or special chars
     */
    public function testNameWithNumbersShouldBeInvalid()
    {
        $client = new Client('Bilu123', '03487624819', (new \DateTime())->sub(new \DateInterval("P20Y")));
    }

    /**
     * @expectedException        CarInsurance\Exception\InvalidClientException
     * @expectedExceptionMessage Client name length should be less than 15 without numbers or special chars
     */
    public function testNameSpecialCharsShouldBeInvalid()
    {
        $client = new Client('Cachaça', '03487624819', (new \DateTime())->sub(new \DateInterval("P20Y")));
    }

    /**
     * @expectedException        CarInsurance\Exception\InvalidClientException
     * @expectedExceptionMessage Client name length should be less than 15 without numbers or special chars
     */
    public function testNameWithMoreThan15CharsShouldBeInvalid()
    {
        $client = new Client('Bilu Bilu Teteia', '03487624819', (new \DateTime())->sub(new \DateInterval("P20Y")));
    }

    public function testDocumentWith11NumbersShouldBeValid()
    {
        $client = new Client('Bilu da Teteia', 12356789012, (new \DateTime())->sub(new \DateInterval("P20Y")));
    }

    /**
     * @expectedException        CarInsurance\Exception\InvalidClientException
     * @expectedExceptionMessage Client document should be a numeric with 11 characters
     */
    public function testDocumentWithLettersShouldBeInvalid()
    {
        $client = new Client('Bilu da Teteia', '12356as1234', (new \DateTime())->sub(new \DateInterval("P20Y")));
    }

    /**
     * @expectedException        CarInsurance\Exception\InvalidClientException
     * @expectedExceptionMessage Client document should be a numeric with 11 characters
     */
    public function testDocumentWithLessThan11NumbersShouldBeInvalid()
    {
        $client = new Client('Bilu da Teteia', 12356, (new \DateTime())->sub(new \DateInterval("P20Y")));
    }

    /**
     * @expectedException        CarInsurance\Exception\InvalidClientException
     * @expectedExceptionMessage Client document should be a numeric with 11 characters
     */
    public function testDocumentWithMoreThan11NumbersShouldBeInvalid()
    {
        $client = new Client('Bilu da Teteia', 12356, (new \DateTime())->sub(new \DateInterval("P20Y")));
    }
}
