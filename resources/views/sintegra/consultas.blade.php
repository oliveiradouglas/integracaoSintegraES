@extends('layouts.app')

@section('content')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

<div class="container">
    <div class="row table-responsive">
        <table class="table table-bordered display" id="listagem">
            <thead>
                <tr>
                    <th>CNPJ</th>
                    <th>Data consulta</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                    <tr>
                        <td>
                            {{ $consulta->resultado_json->cnpj }}
                        </td>
                        <td>
                            {{ $consulta->created_at }}
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
<script type="text/javascript">
    $('#listagem').DataTable({
        "language": {
            "lengthMenu": "Exibir _MENU_",
            "zeroRecords": "Nenhum registro encontrado.",
            "info": "Exibindo _END_ de _TOTAL_ registros",
            "infoEmpty": "Nennhum registro disponível",
            "loadingRecords": "Carregando...",
            "processing":     "Processando...",
            "search":         "Pesquisar", 
            "paginate": {
                "first":      "Primeira",
                "last":       "Ultima",
                "next":       "Próxima",
                "previous":   "Anterior"
            },
        },
        "iDisplayStart": 0,
    });
</script>
@endsection