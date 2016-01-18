<?php

use CarInsurance\Client;
use CarInsurance\Contract;

class ClientTest extends PHPUnit_Framework_TestCase {

    // Requisito 1
    function testClientShouldHaveAttributes() {
        $client = new Client();
        $client
            ->setName('Bruno')
            ->setDocument('03487624819')
            ->setBirthdate(new DateTime('1995-01-25'))
            ->setHomeNumber('34349285')
            ->setPhoneNumber('94349285')
            ->setEmail('brunomrpx@gmail.com')
            ->setMaritalStatus('Single')
            ->setContract(new Contract(123123123));

        $this->assertTrue($client instanceof Client);
    }

}
