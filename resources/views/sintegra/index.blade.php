@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Consultar CNPJ</div>
                <div class="panel-body">
                    <form method="post" action="{{ action('SintegraController@consultar') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-3">CNPJ <strong>*</strong></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="cnpj" id="cnpj" tabindex="1" maxlength="50" required />
                            </div>
                        </div>

                        <div class="form-group col-md-10">
                            <button type="submit" class="btn btn-primary pull-right" tabindex="5" id="btnSalvar">
                                <span class="glyphicon glyphicon-search"></span>
                                Consultar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection