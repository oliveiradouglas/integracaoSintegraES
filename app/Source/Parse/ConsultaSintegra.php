<?php

namespace App\Source\Parse;

class ConsultaSintegra {
	private $bodyConsulta;

	public function __construct($bodyConsulta) {
		$this->bodyConsulta = $bodyConsulta;
	}

	/**
	 * Prepara o json de acordo com o retorno da consulta.
	 * @return json
	 */
	public function parsearParaArray() {
		preg_match_all('/class="titulo"(.*?)>(.*\w.*)<\/td>/', $this->bodyConsulta, $titulos);
        $titulos = $titulos[2];

        preg_match_all('/class="valor"(.*?)>(.*\w?.*)<\/td>/', $this->bodyConsulta, $valores);
        $valores = $valores[2];

        $this->removerIndicesIncorretos($titulos, $valores);

        reset($valores);
        $retorno = [];
        foreach ($titulos as $key => $titulo) {
            $retorno[$this->limparPalavra($titulo)] = trim(current($valores));
            next($valores);
        }

        return $retorno;
	}

    /**
     * Remove os indices do array de titulos e valores que estão comentados ou não fazem parte da consulta.
     * @param array $titulos
     * @param array $valores
     */
    private function removerIndicesIncorretos(array &$titulos, array &$valores) {    	
		// relação de indice do titulo com o indice do valor que é para desconsiderar
        $desconsiderarIndices = [
            16 => 16,
            17 => 17,
            18 => 20
        ];

        foreach ($desconsiderarIndices as $indiceTitulo => $indiceValor) {
            unset($titulos[$indiceTitulo]);
            unset($valores[$indiceValor]);
        }
    }

    /**
     * Remove caracteres especiais e converte espaços em '_' das palavras
     * @param string $palavra
     * @return string
     */
    private function limparPalavra($palavra) {
    	$acentos    = ['ç', 'ã', 'ú', 'ô', 'í'];
        $semAcentos = ['c', 'a', 'u', 'o', 'i'];

		$palavra = strtolower(str_replace($acentos, $semAcentos, $palavra));
        $palavra = preg_replace('/[^A-Za-z0-9\_\s]/', '', $palavra);
        $palavra = str_replace(' ', '_', trim($palavra));

        return $palavra;
    }
}