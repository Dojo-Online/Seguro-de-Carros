<?php

namespace SeguradoraCarro;

class Cliente {

    private $nome;
    private $idade;
    private $cpf;
    private $sexo;
    private $pontosCnh;
    private $estadoCivil;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getCpf(){
        return $this->cpf;        
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;        
    }
    
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    
    public function getSexo(){
        return $this->sexo;
    }

    public function setPontosCnh($pontosCnh) {
        $this->pontosCnh = $pontosCnh;
    }

    public function getPontosCnh() {
        return $this->pontosCnh;
    }

    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    public function getEstadoCivil() {
        return $this->estadoCivil;
    }
}




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

