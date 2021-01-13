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

    public static function getValoresContaReceber() {
        $total = ContaReceber::sum('valor');

        $totalDinheiro = ContaReceber::where('forma_pagamento', '=', 'Dinheiro')->sum('valor');

        $totalBoleto = ContaReceber::where('forma_pagamento', '=', 'Boleto')->sum('valor');

        $totalCartaoCredito = ContaReceber::where('forma_pagamento', '=', 'Cartão de crédito')->sum('valor');

        $totalCartaoDebito = ContaReceber::where('forma_pagamento', '=', 'Cartão de débito')->sum('valor');

        $totalTransferenciaBancaria = ContaReceber::where('forma_pagamento', '=', 'Transferência bancária')->sum('valor');

        return $valores = [
            'total' => $total,
            'totalDinheiro' => $totalDinheiro,
            'totalBoleto' => $totalBoleto,
            'totalCartaoCredito' => $totalCartaoCredito,
            'totalCartaoDebito' => $totalCartaoDebito,
            'totalTransferenciaBancaria' => $totalTransferenciaBancaria
        ];
    }
}
