<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use GuzzleHttp\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Sintegra;
use App\Source\Alerta\Alerta;

class SintegraController extends Controller
{
    /**
     * Tela incial do sistema, onde é exibida a listagem e a opção de fazer uma consulta de cnpj.
     */
    public function index() {
        return view('sintegra.index');
    }

    /**
     * Tela de listagem das consultas salvas
     */
    public function consultas() {
        return view('sintegra.consultas')
            ->with('consultas', Sintegra::where('user_id', \Auth::user()->id)->get());
    }

    /**
     * Método chamado atraves do app web para deletar uma consulta
     * @param $id da consulta
     */
    public function deletarConsulta($id) {
        try {
            Sintegra::where('id', $id)->firstOrFail()->delete();
            Alerta::exibir('Consulta excluida com sucesso!', 'success');
        } catch (\Exception $e) {
            Alerta::exibir('Erro ao excluir consulta!', 'danger');
        }

        return redirect('consultas');
    }

    /**
     * Tela para visualizar consulta
     * @param $id da consulta
     */
    public function visualizarConsulta($id) {
        try {
            $consultaSintegra = Sintegra::where('id', $id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Alerta::exibir('Consulta não encontrada!', 'danger');
            return redirect('/');
        }

        return view('sintegra.visualizar')
            ->with('consultaSintegra', $consultaSintegra);
    }

    /**
     * Método chamado através do cliente web
     * faz uma chamada interna no metodo da API e redireciona para visualizarConsulta
     * @param Request $request
     */
    public function consultarCnpjWeb(Request $request) {
        $retornoApi = $this->apiConsultar($request->input('cnpj'));

        if (!$retornoApi->getData()->status) {
            Alerta::exibir($retornoApi->getData()->erro, 'danger');
            return redirect('/');
        }

        return redirect('visualizar-consulta/' . $retornoApi->getData()->consulta->id);
    }

    /**
     * Faz o tratamento da chamada de consulta da api
     * @return json
     */
    public function apiConsultar($cnpj) {
        $cnpj         = str_replace(['.', '-', '/'], ['', '', ''], $cnpj);
        $bodyConsulta = $this->consultarCnpj($cnpj);

        $retornoFormatado = $this->formatarRetornoConsulta($bodyConsulta);
        if (!$retornoFormatado) {
            return response()->json([
                'status' => false,
                'erro'   => 'CNPJ não encontrado!'
            ], 404);
        }

        $consultaSintegra = Sintegra::create([
            'user_id' => \Auth::user()->id,
            'cnpj'    => $cnpj,
            'resultado_json' => json_encode($retornoFormatado)
        ]);

        $retornoFormatado['id'] = $consultaSintegra->id;

        return response()->json([
            'status'   => true,
            'consulta' => $retornoFormatado
        ]);
    }

    /**
     * Faz a requisição ao sistema da sintegra para consultar o cnpj
     * @param $cnpj
     * @return false caso cnpj não seja encontrado ou body em caso de sucesso
     */
    public function consultarCnpj($cnpj) {
        $client   = new Client();
        $resposta = $client->request('POST', Sintegra::ENDPOINT . 'resultado.php', [
            'form_params' => [
                'num_cnpj' => $cnpj,
                'botao'    => 'Consultar'
            ]
        ]);

        return html_entity_decode(
            utf8_encode(
                $resposta->getBody()->getContents()
            )
        );
    }

    /**
     * Recebe o retorno da consulta e formata para retornar ao cliente
     * @return array | false
     */
    public function formatarRetornoConsulta($bodyConsulta) {
        if (stripos($bodyConsulta, 'class="resultado"') === false) {
            return false;
        }
        
        $parseConsulta = new \App\Source\Parse\ConsultaSintegra($bodyConsulta);
        return $parseConsulta->parsearParaArray();
    }
}
