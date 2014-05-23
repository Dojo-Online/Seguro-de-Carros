<?php

namespace SeguradoraCarro;

class RegrasDeNegocio {

	/**
	 * Requisito #2 - Faixa etaria entre 18 a 60 anos
	 * @param  int $idade Idade a ser validada
	 * @return boolean
	 */
	public static function validaFaixaEtaria($idade) {
		return is_numeric($idade) && ($idade >= 18) && ($idade <= 60);
	}

	/**
	 * Requisito #3 - Nome não pode ter mais de 15 caracteres, sem números ou especiais
	 * @param string $nome Nome a ser validado
	 * @return boolean
	 */
    public static function validaNome($nome) {
		return (bool)preg_match("/^[a-z ]{1,11}$/i", $nome);
		return strlen($nome) <= 15;
    }

	/**
	 * Requisito #4 - CPF 11 caracteres, somente números números, sem especiais
	 * @param  int            $cpf CPF a ser validado
	 * @return boolean
	 */
	public static function validaCPF($cpf) {
		return (strlen($cpf) == 11) && is_numeric($cpf);
	}

	/**
	 * Requisito #5 - Se for sexo do feminino 50% de desconto se: Idade for até 23 anos e CNH sem pontuação
	 * Requisito #6 - Se for sexo do feminino 50% de desconto se: Idade for até 23 anos e CNH sem pontuação
	 * Requisito #7 - Se for sexo do feminino 50% de desconto se: Idade for até 23 anos e CNH sem pontuação
	 */
	public static function calculaDesconto(Cliente $cliente) {
		$desconto = 0;
		if (self::validaCliente($cliente) && $cliente->getSexo() == "Feminino") {
			switch ($cliente->getIdade()) {
				case ($cliente->getIdade() <= 23):
					if ($cliente->getPontosCnh() === 0) {
						$desconto = 50;
					}
					break;
				case ($cliente->getIdade() <= 30):
					if ($cliente->getEstadoCivil() === "Casada") {
						$desconto = 20;
					}
				default://($cliente->getIdade() > 30) :D
					if ($cliente->getEstadoCivil() === "Solteira" && $cliente->getPontosCnh() === 0) {
						$desconto = 10;
					}
					break;
			}

		}
		return $desconto;
	}

	/**
	 * Plus - Valida o cliente conforme todos os testes
	 * @param  Cliente $cliente o Cliente a ser validado
	 * @return boolean
	 */
	public static function validaCliente(Cliente $cliente) {
		$valido = self::validaFaixaEtaria($cliente->getIdade());
		$valido = $valido && self::validaNome($cliente->getNome());
		$valido = $valido && self::validaCPF($cliente->getCpf());
		return $valido;
	}
}

?>