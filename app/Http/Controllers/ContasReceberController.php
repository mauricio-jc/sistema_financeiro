<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormaPagamento;
use App\ContaReceber;
use Session;

class ContasReceberController extends Controller
{
    public function index(Request $request) {
    	$dadosGet = $request->all();
    	$formasPagamentos = FormaPagamento::all();

	  	if(empty($dadosGet) || (sizeof($dadosGet) == 1)) {
    		$contasReceber = ContaReceber::orderBy('id', 'DESC')->get();
        }
        else {
        	$contasReceber = ContaReceber::getContaReceber($dadosGet['codigo'], $dadosGet['cliente'], $dadosGet['forma_pagamento']);
        }

    	return view('contas_receber.index', compact('formasPagamentos', 'contasReceber'));
    }

    public function add() {
    	$formasPagamentos = FormaPagamento::all();
    	return view('contas_receber.add', compact('formasPagamentos'));
    }

    public function store(Request $request) {
    	$dados = $request->all();
    	$dados['data'] = convertDateDb($dados['data']);
    	$dados['valor'] = convertDecimalDb($dados['valor']);

    	$contaReceber = new ContaReceber($dados);

    	if($contaReceber->save()) {
    		Session::flash('success', 'Recebimento cadastrado com sucesso.');
    		return redirect('/contas-receber/editar/' . $contaReceber->id);
    	}
    	else {
    		Session::flash('error', 'Problemas ao cadastrar recebimento. Tente novamente.');
    		return redirect('/contas-receber/adicionar');
    	}
    }

    public function edit($id) {
    	$contaReceber = ContaReceber::find($id);
    	$formasPagamentos = FormaPagamento::all();
    	return view('contas_receber.edit', compact('contaReceber', 'formasPagamentos'));
    }

    public function update(Request $request, $id) {
    	$dados = $request->all();
    	$contaReceber = ContaReceber::find($id);

    	$dados['data'] = convertDateDb($dados['data']);
    	$dados['valor'] = convertDecimalDb($dados['valor']);

    	if($contaReceber->update($dados)) {
    		Session::flash('success', 'Recebimento atualizado com sucesso.');
    	}
    	else {
    		Session::flash('error', 'Problemas ao atualizar recebimento. Tente novamente.');
    	}

    	return redirect('/contas-receber/editar/' . $contaReceber->id);
    }
}
