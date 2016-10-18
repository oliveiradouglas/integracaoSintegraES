@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="panel panel-default">
	    	<div class="panel-heading">
	    		<span class="glyphicon glyphicon-info-sign"></span>
	    		Informações do CNPJ
	    	</div>

		    <div class="panel-body">
				<div class="table-responsive">
			    	<table class="table table-bordered display">
			    		<thead>
			    			<tr>
			    				<th>Atributo</th>
			    				<th>Valor</th>
			    			</tr>
			    		</thead>

			    		<tbody>
			    			<tr>
			    				<td>CNPJ</td>
			    				<td>{{ $consultaSintegra->resultado_json->cnpj }}</td>
			    			</tr>
			    			<tr>
			    				<td>Inscrição estadual</td>
			    				<td>{{ $consultaSintegra->resultado_json->inscricao_estadual }}</td>
			    			</tr>
			    			<tr>
			    				<td>Razão social</td>
			    				<td>{{ $consultaSintegra->resultado_json->razao_social }}</td>
			    			</tr>
			    			<tr>
			    				<td>Logradouro</td>
			    				<td>{{ $consultaSintegra->resultado_json->logradouro }}</td>
			    			</tr>
			    			<tr>
			    				<td>Número</td>
			    				<td>{{ $consultaSintegra->resultado_json->numero }}</td>
			    			</tr>
			    			<tr>
			    				<td>Complemento</td>
			    				<td>{{ $consultaSintegra->resultado_json->complemento }}</td>
			    			</tr>
			    			<tr>
			    				<td>Bairro</td>
			    				<td>{{ $consultaSintegra->resultado_json->bairro }}</td>
			    			</tr>
			    			<tr>
			    				<td>Município</td>
			    				<td>{{ $consultaSintegra->resultado_json->municipio }}</td>
			    			</tr>
			    			<tr>
			    				<td>UF</td>
			    				<td>{{ $consultaSintegra->resultado_json->uf }}</td>
			    			</tr>
			    			<tr>
			    				<td>CEP</td>
			    				<td>{{ $consultaSintegra->resultado_json->cep }}</td>
			    			</tr>
			    			<tr>
			    				<td>Telefone</td>
			    				<td>{{ $consultaSintegra->resultado_json->telefone }}</td>
			    			</tr>
			    			<tr>
			    				<td>Atividade econômica</td>
			    				<td>{{ $consultaSintegra->resultado_json->atividade_economica }}</td>
			    			</tr>
			    			<tr>
			    				<td>Data de inicio de atividade</td>
			    				<td>{{ $consultaSintegra->resultado_json->data_de_inicio_de_atividade }}</td>
			    			</tr>
			    			<tr>
			    				<td>Situação cadastral vigênte</td>
			    				<td>{{ $consultaSintegra->resultado_json->situacao_cadastral_vigente }}</td>
			    			</tr>
			    			<tr>
			    				<td>Data desta situação cadastral</td>
			    				<td>{{ $consultaSintegra->resultado_json->data_desta_situacao_cadastral }}</td>
			    			</tr>
			    			<tr>
			    				<td>Regime de apuração</td>
			    				<td>{{ $consultaSintegra->resultado_json->regime_de_apuracao }}</td>
			    			</tr>
			    			
			    			@if (isset($consultaSintegra->resultado_json->emitente_de_nfe_desde))
				    			<tr>
				    				<td>Emitente de NF-e desde</td>
				    				<td>{{ $consultaSintegra->resultado_json->emitente_de_nfe_desde }}</td>
				    			</tr>
			    			@endif
			    			
			    			@if (isset($consultaSintegra->resultado_json->obrigada_a_nfe_em))
				    			<tr>
				    				<td>Obrigada a NF-e em</td>
				    				<td>{{ $consultaSintegra->resultado_json->obrigada_a_nfe_em }}</td>
				    			</tr>
			    			@endif
			    			
			    			<tr>
			    				<td>Data da consulta</td>
			    				<td>{{ $consultaSintegra->created_at }}</td>
			    			</tr>
			    		</tbody>
			    	</table>
			    </div>
		  	</div>
		</div>
	</div>
</div>
@endsection