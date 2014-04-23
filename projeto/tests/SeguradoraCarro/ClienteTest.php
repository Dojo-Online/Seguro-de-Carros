<?php

use SeguradoraCarro\Cliente;

class ClientTest extends PHPUnit_Framework_TestCase {
    
    function testGetIdade() {
        $cliente = new Cliente();
        $cliente->setIdade(19);
        $this->assertEquals(19, $cliente->getIdade());
    }
    
    function testFaixaEtaria() {
        $cliente = new Cliente();
        $cliente->setIdade(19);
        $this->assertGreaterThanOrEqual(18, $cliente->getIdade());
        $this->assertLessThanOrEqual(60, $cliente->getIdade());
    }
    
    
    function testIdadeValido() {
        $cliente = new Cliente();
        
        $cliente->setIdade(19);
        $this->assertTrue($cliente->validateIdade());
        
    }
    
    
    function testIdadeInValido() {
        $cliente = new Cliente();
        
        $cliente->setIdade(12);
        $this->assertFalse($cliente->validateIdade());
        
    }
    
    function testCaracteresNome(){
        $cliente = new Cliente();
        
        $cliente->setNome(`Bilu`);
        $this->assertTrue($cliente->validateNome());
    }
    
    function testGetCPF(){
        $cliente = new Cliente();
        
        $cliente->setCpf(97622242222);
        $this->assertEquals(97622242222, $cliente->getCpf());
    }
    function testCPFisValid(){
        $cliente = new Cliente();
        
        $cliente->setCpf(97622242222);
        $this->assertTrue($cliente->validateCPF());
    }
    
     function testeSexoFemenino(){
        $cliente = new Cliente();
        $client->setSexo("Femenino");
        $this->assertTrue($this->validadeFeminino());
     
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

