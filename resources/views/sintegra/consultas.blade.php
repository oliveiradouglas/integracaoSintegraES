@extends('layouts.app')

@section('content')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

<div class="container">
    <div class="row table-responsive">
        <table class="table table-bordered display" id="listagem">
            <thead>
                <tr>
                    <th>CNPJ</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                    <tr>
                        <td>
                            {{ $consulta->cnpj }}
                        </td>
                        <td class="text-center">
                            <a href="{{ action('SintegraController@visualizarConsulta', $consulta->id) }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-eye-open" title="Visualizar consulta"></span>
                            </a>
                            <a href="{{ action('SintegraController@deletarConsulta', $consulta->id) }}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove" title="Deletar consulta"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
@endsection