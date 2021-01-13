<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ContaReceber extends Model
{
    protected $table = 'contas_receber';
    protected $fillable = ['cliente', 'data', 'valor', 'forma_pagamento', 'observacoes'];

    public static function getContaReceber($codigo = 0, $cliente = null, $formaPagamento = 'Todos') {
    	$contaReceber = DB::table('contas_receber');

    	if($codigo != 0) {
    		$contaReceber = $contaReceber->where('id', '=', $codigo);
    	}

    	if(!is_null($cliente)) {
    		$contaReceber = $contaReceber->where("cliente", "like", "%$cliente%");
    	}

    	if($formaPagamento != 'Todos') {
    		$contaReceber = $contaReceber->where('forma_pagamento', '=', $formaPagamento);
    	}

    	$contaReceber = $contaReceber->orderBy('id', 'DESC')->get();
    	return $contaReceber;
    }
}
