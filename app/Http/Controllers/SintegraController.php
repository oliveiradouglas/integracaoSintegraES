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

    }

    public function consultar(Request $request) {
        $validacao = $this->validarCnpj($request->input('cnpj'));
        if (!$validacao['status']) {
            return response()->json($validacao, 400);
        }

        $retornoConsulta = $this->consultarCnpj($request->input('cnpj'));
        // dd($retornoConsulta);

        // relação de indice do titulo com o indice do valor que é para desconsiderar
        $desconsiderarIndices = [
            16 => 16,
            17 => 17,
            18 => 20
        ];

        preg_match_all('/class="titulo"(.*?)>(.*\w.*)<\/td>/', $retornoConsulta, $titulos);
        // dd($titulos);
        $titulos = $titulos[2];
        preg_match_all('/class="valor"(.*?)>(.*\w?.*)<\/td>/', $retornoConsulta, $valores);
        // dd($valores);
        $valores = $valores[2];

        foreach ($desconsiderarIndices as $indiceTitulo => $indiceValor) {
            unset($titulos[$indiceTitulo]);
            unset($valores[$indiceValor]);
        }
 
        $from = ['ç', 'ã', 'ú'];
        $to = ['c', 'a', 'u'];

        reset($valores);
        $retorno = [];
        foreach ($titulos as $key => $titulo) {
            $titulo = str_replace([':', '&nbsp;'], ['', ''], $titulo);
            $titulo = strtolower(str_replace(' ', '_', trim($titulo)));
            $titulo = str_replace($from, $to, $titulo);
            if ($key == 2) {
                dd($titulo);
            }
            // $titulo = strtolower(str_replace([' ', '&nbsp;', ':'], ['_', '', ''], trim($titulo)));
            // $tituloSemAcento = preg_replace(array_keys($utf8), array_values($utf8), $titulo);
            
            // dd($titulo);
            // $tituloSemCaracteresEspeciais = preg_replace('/[^A-Za-z0-9\_]/', '', $titulo);
            // dd($tituloSemCaracteresEspeciais);
            $retorno[$titulo] = trim(current($valores));
            next($valores);
        }
dd($retorno);
        dd($this->formatarRetornoConsulta($retornoConsulta));
    }

    /**
    * Faz a validação do cnpj enviado na requisição
    * @param $cnpj
    * @return array
    */
    private function validarCnpj($cnpj) {
        $validacao = Validator::make(
            ['num_cnpj' => $cnpj],
            ['num_cnpj' => 'required|min:18']
        );

        if ($validacao->fails()) {
            return [
                'status' => false,
                'error'  => implode(', ', $validacao->getMessageBag()->getMessages()['num_cnpj'])
            ];
        }

        return ['status' => true];
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

        return $resposta->getBody()->getContents();
    }

    /**
     * Recebe o retorno da consulta e formata para retornar ao cliente
     * @return 
     */
    public function formatarRetornoConsulta($retornoConsulta) {
        if (stripos($body, 'class="resultado"') === false) {
            return false;
        }
        
        return $body;
    }
}
