<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ContaPagar extends Model
{
    protected $table = 'contas_pagar';
    protected $fillable = ['data', 'valor', 'forma_pagamento', 'situacao', 'observacoes'];

    public static function getContaPagar($dataIni = '', $dataFim = '', $formaPagamento = 'Todos', $situacao = 'Todos') {
    	$contasPagar = DB::table('contas_pagar');

    	if($dataIni != '') $contasPagar = $contasPagar->where('data', '>=', convertDateDb($dataIni));

    	if($dataFim != '') $contasPagar = $contasPagar->where('data', '<=', convertDateDb($dataFim));

    	if($formaPagamento != 'Todos') $contasPagar = $contasPagar->where('forma_pagamento', '=', $formaPagamento);

    	if($situacao != 'Todos') $contasPagar = $contasPagar->where('situacao', '=', $situacao);

    	return $contasPagar->orderBy('id', 'desc')->paginate(20);
    }

    public static function getValoresContaPagar() {
        $total = ContaPagar::where('situacao', 'Pago')->sum('valor');

        $totalDinheiro = ContaPagar::where('forma_pagamento', '=', 'Dinheiro')->where('situacao', 'Pago')->sum('valor');

        $totalBoleto = ContaPagar::where('forma_pagamento', '=', 'Boleto')->where('situacao', 'Pago')->sum('valor');

        $totalCartaoCredito = ContaPagar::where('forma_pagamento', '=', 'Cartão de crédito')->where('situacao', 'Pago')->sum('valor');

        $totalCartaoDebito = ContaPagar::where('forma_pagamento', '=', 'Cartão de débito')->where('situacao', 'Pago')->sum('valor');

        $totalTransferenciaBancaria = ContaPagar::where('forma_pagamento', '=', 'Transferência bancária')->where('situacao', 'Pago')->sum('valor');

        return $valores = [
            'total' => $total,
            'totalDinheiro' => $totalDinheiro,
            'totalBoleto' => $totalBoleto,
            'totalCartaoCredito' => $totalCartaoCredito,
            'totalCartaoDebito' => $totalCartaoDebito,
            'totalTransferenciaBancaria' => $totalTransferenciaBancaria
        ];
    }

    public static function getValoresContaPagarByData($dataIni, $dataFim) {

        $total = ContaPagar::where('situacao', 'Pago')
                                ->where('data', '>=', convertDateDb($dataIni))
                                ->where('data', '<=', convertDateDb($dataFim))
                                ->sum('valor');

        $totalDinheiro = ContaPagar::where('forma_pagamento', '=', 'Dinheiro')
                                        ->where('situacao', 'Pago')
                                        ->where('data', '>=', convertDateDb($dataIni))
                                        ->where('data', '<=', convertDateDb($dataFim))
                                        ->sum('valor');

        $totalBoleto = ContaPagar::where('forma_pagamento', '=', 'Boleto')
                                    ->where('situacao', 'Pago')
                                    ->where('data', '>=', convertDateDb($dataIni))
                                    ->where('data', '<=', convertDateDb($dataFim))
                                    ->sum('valor');

        $totalCartaoCredito = ContaPagar::where('forma_pagamento', '=', 'Cartão de crédito')
                                            ->where('situacao', 'Pago')
                                            ->where('data', '>=', convertDateDb($dataIni))
                                            ->where('data', '<=', convertDateDb($dataFim))
                                            ->sum('valor');

        $totalCartaoDebito = ContaPagar::where('forma_pagamento', '=', 'Cartão de débito')
                                            ->where('situacao', 'Pago')
                                            ->where('data', '>=', convertDateDb($dataIni))
                                            ->where('data', '<=', convertDateDb($dataFim))
                                            ->sum('valor');

        $totalTransferenciaBancaria = ContaPagar::where('forma_pagamento', '=', 'Transferência bancária')
                                                    ->where('situacao', 'Pago')
                                                    ->where('data', '>=', convertDateDb($dataIni))
                                                    ->where('data', '<=', convertDateDb($dataFim))
                                                    ->sum('valor');

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
