<?php

use SeguradoraCarro\Cliente;
use SeguradoraCarro\RegrasDeNegocio;

class ClienteTest extends PHPUnit_Framework_TestCase {
    
    function testGetIdade() {
        $cliente = new Cliente();
        $cliente->setIdade(19);
        $this->assertEquals(19, $cliente->getIdade());
    }
    
    /**
     * Testa o Requisito #2
     */
    function testFaixaEtaria() {
        $cliente = new Cliente();
        $cliente->setIdade(19);
        $this->assertGreaterThanOrEqual(18, $cliente->getIdade());
        $this->assertLessThanOrEqual(60, $cliente->getIdade());


        $cliente->setIdade(17);
        $this->assertFalse(RegrasDeNegocio::validaFaixaEtaria($cliente->getIdade()));

        $cliente->setIdade(18);
        $this->assertTrue(RegrasDeNegocio::validaFaixaEtaria($cliente->getIdade()));

        $cliente->setIdade(19);
        $this->assertTrue(RegrasDeNegocio::validaFaixaEtaria($cliente->getIdade()));

        $cliente->setIdade(59);
        $this->assertTrue(RegrasDeNegocio::validaFaixaEtaria($cliente->getIdade()));

        $cliente->setIdade(60);
        $this->assertTrue(RegrasDeNegocio::validaFaixaEtaria($cliente->getIdade()));

        $cliente->setIdade(61);
        $this->assertFalse(RegrasDeNegocio::validaFaixaEtaria($cliente->getIdade()));
    }

    /**
     * Testa o requisito #3
     */
    function testCaracteresNome() {
        $cliente = new Cliente();

        $cliente->setNome('Bilu');
        $this->assertTrue(RegrasDeNegocio::validaNome($cliente->getNome()));

        $cliente->setNome('Bi1u');
        $this->assertFalse(RegrasDeNegocio::validaNome($cliente->getNome()));

        $cliente->setNome('Bilu Bilu Teteia');
        $this->assertFalse(RegrasDeNegocio::validaNome($cliente->getNome()));

        $cliente->setNome('Bilu Bilu T');
        $this->assertTrue(RegrasDeNegocio::validaNome($cliente->getNome()));

        $cliente->setNome('Bil Cachaça');
        $this->assertFalse(RegrasDeNegocio::validaNome($cliente->getNome()));

        $cliente->setNome('Cachaça');
        $this->assertFalse(RegrasDeNegocio::validaNome($cliente->getNome()));
    }
    
    function testGetCPF(){
        $cliente = new Cliente();
        
        $cliente->setCpf(97622242222);
        $this->assertEquals(97622242222, $cliente->getCpf());
    }

    /**
     * Testa o Requisito #4
     */
    function testCpfValido(){
        $cliente = new Cliente();

        $cliente->setCpf(97622242222);
        $this->assertTrue(RegrasDeNegocio::validaCPF($cliente->getCpf()));

        $cliente->setCpf("a97622242222");
        $this->assertFalse(RegrasDeNegocio::validaCPF($cliente->getCpf()));

        $cliente->setCpf(242222);
        $this->assertFalse(RegrasDeNegocio::validaCPF($cliente->getCpf()));
    }
    
    /**
     * Testa os requisitos #5, #6
     */
    function testCalculoDesconto() {
        /**
         * Testa o requisito #5
         */
        $cliente = new Cliente();
        $cliente->setNome('Perna Longa');
        $cliente->setCpf(97622242222);
        $cliente->setSexo("Masculino");
        $cliente->setPontosCnh(11);
        $cliente->setIdade(23);

        $this->assertEquals(0, RegrasDeNegocio::calculaDesconto($cliente));

        $cliente->setNome('Felicia');
        $cliente->setSexo("Feminino");
        $this->assertEquals(0, RegrasDeNegocio::calculaDesconto($cliente));

        $cliente->setPontosCnh(1);
        $this->assertEquals(0, RegrasDeNegocio::calculaDesconto($cliente));

        $cliente->setPontosCnh(0);
        $this->assertEquals(50, RegrasDeNegocio::calculaDesconto($cliente));

        $cliente->setIdade(19);
        $this->assertEquals(50, RegrasDeNegocio::calculaDesconto($cliente));

        /**
         * Testa o requisito #6
         */
        $cliente = new Cliente();
        $cliente->setNome('Felicia');
        $cliente->setCpf(97622242222);
        $cliente->setSexo("Feminino");
        $cliente->setEstadoCivil("Solteira");
        $cliente->setIdade(28);

        $this->assertEquals(0, RegrasDeNegocio::calculaDesconto($cliente));

        $cliente->setEstadoCivil("Casada");
        $this->assertEquals(20, RegrasDeNegocio::calculaDesconto($cliente));

        /**
         * Testa o requisito #7
         */
        $cliente = new Cliente();
        $cliente->setNome('Felicia');
        $cliente->setCpf(97622242222);
        $cliente->setSexo("Feminino");
        $cliente->setEstadoCivil("Casada");
        $cliente->setPontosCnh(3);
        $cliente->setIdade(38);
        $this->assertEquals(0, RegrasDeNegocio::calculaDesconto($cliente));

        $cliente->setEstadoCivil("Solteira");
        $this->assertEquals(0, RegrasDeNegocio::calculaDesconto($cliente));

        $cliente->setPontosCnh(0);
        $this->assertEquals(10, RegrasDeNegocio::calculaDesconto($cliente));

        $cliente->setEstadoCivil("Casada");
        $this->assertEquals(0, RegrasDeNegocio::calculaDesconto($cliente));


        $cliente->setEstadoCivil("Solteira");
        $cliente->setIdade(61);
        $this->assertEquals(0, RegrasDeNegocio::calculaDesconto($cliente));
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

