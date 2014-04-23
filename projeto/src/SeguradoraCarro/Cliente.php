<?php

namespace SeguradoraCarro;

class Cliente {
    
    
    private $nome;
    private $idade;
    private $cpf;
    private $sexo;
    
    public function getNome() {
        return $this->nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function validateNome(){
       return strlen($this->nome) <= 15;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }
    
    public function validateIdade() {
        return $this->idade >= 18 && $this->idade <= 60;
    }
    
    public function getCpf(){
        return $this->cpf;        
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;        
    }
    public function validateCPF(){
       return (strlen($this->cpf) == 11) && is_numeric($this->cpf);
    }
    
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    
    public function getSexo(){
        return $this->sexo;
    }
    
    public function validateFeminino(){
        
    }
}




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

