<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormaPagamento;
use App\ContaPagar;
use Session;

class ContasPagarController extends Controller
{
    public function index(Request $request) {
    	$dadosGet = $request->all();
    	$formasPagamentos = FormaPagamento::all();

	  	if(empty($dadosGet) || (sizeof($dadosGet) == 1)) {
    		$contasPagar = ContaPagar::orderBy('id', 'DESC')->get();
        }
        else {
        	$contasPagar = ContaPagar::getContaPagar($dadosGet['codigo'], $dadosGet['forma_pagamento']);
        }

    	return view('contas_pagar.index', compact('formasPagamentos', 'contasPagar'));
    }

    public function add() {
    	$formasPagamentos = FormaPagamento::all();
    	return view('contas_pagar.add', compact('formasPagamentos'));
    }

    public function store(Request $request) {
    	$dados = $request->all();
    	$dados['data'] = convertDateDb($dados['data']);
    	$dados['valor'] = convertDecimalDb($dados['valor']);

    	$contaPagar = new ContaPagar($dados);

    	if($contaPagar->save()) {
    		Session::flash('success', 'Pagamento cadastrado com sucesso.');
    		return redirect('/contas-pagar/editar/' . $contaPagar->id);
    	}
    	else {
    		Session::flash('error', 'Problemas ao cadastrar pagamento. Tente novamente.');
    		return redirect('/contas-pagar/adicionar');
    	}
    }

    public function edit($id) {
    	$contaPagar = ContaPagar::find($id);
    	$formasPagamentos = FormaPagamento::all();
    	return view('contas_pagar.edit', compact('contaPagar', 'formasPagamentos'));
    }

    public function update(Request $request, $id) {
    	$dados = $request->all();
    	$contaPagar = ContaPagar::find($id);

    	$dados['data'] = convertDateDb($dados['data']);
    	$dados['valor'] = convertDecimalDb($dados['valor']);

    	if($contaPagar->update($dados)) {
    		Session::flash('success', 'Pagamento atualizado com sucesso.');
    	}
    	else {
    		Session::flash('error', 'Problemas ao atualizar pagamento. Tente novamente.');
    	}

    	return redirect('/contas-pagar/editar/' . $contaPagar->id);
    }

    public function delete($id) {
    	$contaPagar = ContaPagar::find($id);

    	if($contaPagar->delete()) {
    		Session::flash('success', 'Pagamento excluído com sucesso.');
    	}
    	else {
    		Session::flash('error', 'Problemas ao excluir pagamento. Tente novamente.');
    	}

    	return redirect('/contas-pagar');
    }
}
