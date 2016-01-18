<?php

use CarInsurance\Client;
use CarInsurance\Validators\Client\AgeValidator;

class AgeValidatorTest extends PHPUnit_Framework_TestCase {

    private $validator;

    public function setUp() {
        $this->validator = new AgeValidator();
    }

    function testClientAgeShouldBeBetween18and60() {
        $client = new Client();
        $client->setBirthdate(new DateTime('1995-01-25'));

        $this->assertTrue($this->validator->validate($client));

        $client->setBirthdate(new DateTime('2000-01-25'));

        $this->assertFalse($this->validator->validate($client));
    }

}
