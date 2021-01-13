<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContaReceber;
use App\ContaPagar;
use PDF;

class RelatoriosController extends Controller
{
    public function index() {
    	return view('relatorios.index');
    }

    public function print($tipo) {
        if($tipo == 'contas_receber') {
            $contasReceber = ContaReceber::orderBy('id', 'DESC')->get();
            $pdf = PDF::loadView('relatorios.contas_receber', ['contasReceber' => $contasReceber]);
         	return $pdf->stream('contas_receber.pdf');
        }
        else {
            $contasPagar = ContaPagar::orderBy('id', 'DESC')->get();
            $pdf = PDF::loadView('relatorios.contas_pagar', ['contasPagar' => $contasPagar]);
            return $pdf->stream('contas_pagar.pdf');
        }
    }
}
