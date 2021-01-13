<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ContaPagar extends Model
{
    protected $table = 'contas_pagar';
    protected $fillable = ['data', 'valor', 'forma_pagamento', 'observacoes'];

    public static function getContaPagar($codigo = 0, $formaPagamento = 'Todos') {
    	$contaPagar = DB::table('contas_pagar');

    	if($codigo != 0) {
    		$contaPagar = $contaPagar->where('id', '=', $codigo);
    	}

    	if($formaPagamento != 'Todos') {
    		$contaPagar = $contaPagar->where('forma_pagamento', '=', $formaPagamento);
    	}

    	$contaPagar = $contaPagar->orderBy('id', 'DESC')->get();
    	return $contaPagar;
    }
}
