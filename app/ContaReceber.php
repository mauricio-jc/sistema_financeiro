<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ContaReceber extends Model
{
    protected $table = 'contas_receber';
    protected $fillable = ['cliente', 'data', 'valor', 'forma_pagamento', 'situacao', 'observacoes'];

    public static function getContaReceber($nome = '', $dataIni = '', $dataFim = '', $formaPagamento = 'Todos', $situacao = 'Todos') {
    	$contasReceber = DB::table('contas_receber');

    	if($nome != '') $contasReceber = $contasReceber->where("nome_cliente", "like", "%$nome%");

    	if($dataIni != '') $contasReceber = $contasReceber->where('data', '>=', convertDateDb($dataIni));

    	if($dataFim != '') $contasReceber = $contasReceber->where('data', '<=', convertDateDb($dataFim));

    	if($formaPagamento != 'Todos') $contasReceber = $contasReceber->where('forma_pagamento', '=', $formaPagamento);

    	if($situacao != 'Todos') $contasReceber = $contasReceber->where('situacao', '=', $situacao);

    	return $contasReceber->orderBy('id', 'desc')->paginate(20);
    }

    public static function getValoresContaReceber() {
        $total = ContaReceber::where('situacao', 'Recebido')->sum('valor');

        $totalDinheiro = ContaReceber::where('forma_pagamento', '=', 'Dinheiro')->where('situacao', 'Recebido')->sum('valor');

        $totalBoleto = ContaReceber::where('forma_pagamento', '=', 'Boleto')->where('situacao', 'Recebido')->sum('valor');

        $totalCartaoCredito = ContaReceber::where('forma_pagamento', '=', 'Cartão de crédito')->where('situacao', 'Recebido')->sum('valor');

        $totalCartaoDebito = ContaReceber::where('forma_pagamento', '=', 'Cartão de débito')->where('situacao', 'Recebido')->sum('valor');

        $totalTransferenciaBancaria = ContaReceber::where('forma_pagamento', '=', 'Transferência bancária')->where('situacao', 'Recebido')->sum('valor');

        return $valores = [
            'total' => $total,
            'totalDinheiro' => $totalDinheiro,
            'totalBoleto' => $totalBoleto,
            'totalCartaoCredito' => $totalCartaoCredito,
            'totalCartaoDebito' => $totalCartaoDebito,
            'totalTransferenciaBancaria' => $totalTransferenciaBancaria
        ];
    }

    public static function getValoresContaReceberByData($dataIni, $dataFim) {

        $total = ContaReceber::where('situacao', 'Recebido')
                                ->where('data', '>=', convertDateDb($dataIni))
                                ->where('data', '<=', convertDateDb($dataFim))
                                ->sum('valor');

        $totalDinheiro = ContaReceber::where('forma_pagamento', '=', 'Dinheiro')
                                        ->where('situacao', 'Recebido')
                                        ->where('data', '>=', convertDateDb($dataIni))
                                        ->where('data', '<=', convertDateDb($dataFim))
                                        ->sum('valor');

        $totalBoleto = ContaReceber::where('forma_pagamento', '=', 'Boleto')
                                    ->where('situacao', 'Recebido')
                                    ->where('data', '>=', convertDateDb($dataIni))
                                    ->where('data', '<=', convertDateDb($dataFim))
                                    ->sum('valor');

        $totalCartaoCredito = ContaReceber::where('forma_pagamento', '=', 'Cartão de crédito')
                                            ->where('situacao', 'Recebido')
                                            ->where('data', '>=', convertDateDb($dataIni))
                                            ->where('data', '<=', convertDateDb($dataFim))
                                            ->sum('valor');

        $totalCartaoDebito = ContaReceber::where('forma_pagamento', '=', 'Cartão de débito')
                                            ->where('situacao', 'Recebido')
                                            ->where('data', '>=', convertDateDb($dataIni))
                                            ->where('data', '<=', convertDateDb($dataFim))
                                            ->sum('valor');

        $totalTransferenciaBancaria = ContaReceber::where('forma_pagamento', '=', 'Transferência bancária')
                                                    ->where('situacao', 'Recebido')
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
