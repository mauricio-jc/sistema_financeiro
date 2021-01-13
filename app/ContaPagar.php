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

    public static function getValoresContaPagar() {
        $total = ContaPagar::sum('valor');

        $totalDinheiro = ContaPagar::where('forma_pagamento', '=', 'Dinheiro')->sum('valor');

        $totalBoleto = ContaPagar::where('forma_pagamento', '=', 'Boleto')->sum('valor');

        $totalCartaoCredito = ContaPagar::where('forma_pagamento', '=', 'Cartão de crédito')->sum('valor');

        $totalCartaoDebito = ContaPagar::where('forma_pagamento', '=', 'Cartão de débito')->sum('valor');

        $totalTransferenciaBancaria = ContaPagar::where('forma_pagamento', '=', 'Transferência bancária')->sum('valor');

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
