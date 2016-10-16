<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sintegra extends Model {
	use SoftDeletes;

    const ENDPOINT = 'http://www.sintegra.es.gov.br/';

    protected $table = 'sintegra';
}
