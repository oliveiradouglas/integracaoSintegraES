<?php

namespace App\Source\Alerta;

class Alerta {
	private $mensagem;
	private $tipo;

	public function __construct($mensagem, $tipo) {
		$this->setMensagem($mensagem);
		$this->setTipo($tipo);
	}

    public function getMensagem() {
        return $this->mensagem;
    }

    private function setMensagem($mensagem) {
        $this->mensagem = $mensagem;

        return $this;
    }

    public function getTipo() {
        return $this->tipo;
    }

    private function setTipo($tipo) {
        $this->tipo = $tipo;

        return $this;
    }

	public static function exibir($mensagem, $tipo) {
		\Session::push('alertas', new self($mensagem, $tipo));
	}    
}