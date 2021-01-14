<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContaReceber;
use App\ContaPagar;

class CaixaController extends Controller
{
    public function index() {
    	$valoresReceber = ContaReceber::getValoresContaReceber();
    	$valoresPagar = ContaPagar::getValoresContaPagar();
		$saldo = $valoresReceber['total'] - $valoresPagar['total'];

		$valoresReceber['total'] = formatCoin($valoresReceber['total']);
    	$valoresReceber['totalDinheiro'] = formatCoin($valoresReceber['totalDinheiro']);
    	$valoresReceber['totalBoleto'] = formatCoin($valoresReceber['totalBoleto']);
    	$valoresReceber['totalCartaoCredito'] = formatCoin($valoresReceber['totalCartaoCredito']);
    	$valoresReceber['totalCartaoDebito'] = formatCoin($valoresReceber['totalCartaoDebito']);
    	$valoresReceber['totalTransferenciaBancaria'] = formatCoin($valoresReceber['totalTransferenciaBancaria']);

		$valoresPagar['total'] = formatCoin($valoresPagar['total']);
    	$valoresPagar['totalDinheiro'] = formatCoin($valoresPagar['totalDinheiro']);
    	$valoresPagar['totalBoleto'] = formatCoin($valoresPagar['totalBoleto']);
    	$valoresPagar['totalCartaoCredito'] = formatCoin($valoresPagar['totalCartaoCredito']);
    	$valoresPagar['totalCartaoDebito'] = formatCoin($valoresPagar['totalCartaoDebito']);
    	$valoresPagar['totalTransferenciaBancaria'] = formatCoin($valoresPagar['totalTransferenciaBancaria']);
    	
    	return response()->json([
    		'valoresReceber' => $valoresReceber,
    		'valoresPagar' => $valoresPagar,
    		'saldo' => formatCoin($saldo)
    	]);
    }
}
