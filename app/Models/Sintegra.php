<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sintegra extends Model {
	use SoftDeletes;

    const ENDPOINT = 'http://www.sintegra.es.gov.br/';

    protected $table    = 'sintegra';
    protected $fillable = ['cnpj', 'user_id', 'resultado_json'];

    public function getResultadoJsonAttribute($resultado) {
    	return json_decode($resultado);
    }

    public function getCreatedAtAttribute($created) {
    	return (new \DateTime($created))->format('d/m/Y');
    }
}
