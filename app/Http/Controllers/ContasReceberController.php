<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormaPagamento;
use App\ContaReceber;

class ContasReceberController extends Controller
{
    public function index() {
    	$formasPagamentos = FormaPagamento::all();
    	$contasReceber = ContaReceber::all();

    	return view('contas_receber.index', compact('formasPagamentos', 'contasReceber'));
    }
}
