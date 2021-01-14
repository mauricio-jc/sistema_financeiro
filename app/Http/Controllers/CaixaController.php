<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContaReceber;
use App\ContaPagar;

class CaixaController extends Controller
{
    public function index() {
    	$valoresReceber = ContaReceber::getValoresContaReceber();
		$valoresPagar = ContaPagar::getValoresContaPagar();
		$saldo = $valoresReceber['total'] - $valoresPagar['total'];
    	return view('caixa.index', compact('valoresReceber', 'valoresPagar', 'saldo'));
    }
}
