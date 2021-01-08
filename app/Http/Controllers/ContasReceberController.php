<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilController;
use App\FormaPagamento;
use App\ContaReceber;
use Session;

class ContasReceberController extends Controller
{
    public function index(Request $request) {
        $dadosGet = $request->all();
        $formasPagamentos = FormaPagamento::orderBy('nome', 'asc')->get();
        $aberto = ContaReceber::where('situacao', 'Aberto')->sum('valor');

        if(empty($dadosGet) || (sizeof($dadosGet) == 1 && array_key_exists("page", $dadosGet))) {
            $contasReceber = ContaReceber::orderBy('id', 'desc')->paginate(20);
        }
        else {
            $dadosGet = UtilController::verificaCamposGet($dadosGet);
            $contasReceber = ContaReceber::getContaReceber($dadosGet['cliente'], $dadosGet['data_ini'], $dadosGet['data_fim'], $dadosGet['forma_pagamento'], $dadosGet['situacao']);
        }

    	return view('contas_receber.index', compact('dadosGet', 'formasPagamentos', 'aberto', 'contasReceber'));
    }

    public function add() {
    	$formasPagamentos = FormaPagamento::orderBy('nome', 'asc')->get();
    	return view('contas_receber.add', compact('formasPagamentos'));
    }

    public function store(Request $request) {
    	$dados = $request->all();
        $dados['data'] = convertDateDb($dados['data']);
        $dados['valor'] = convertDecimalDb($dados['valor']);

    	$contaReceber = new ContaReceber($dados);

    	if($contaReceber->save()) {
    		Session::flash('success', 'Recebimento cadastrado com sucesso.');
    		return redirect('/contas-receber');
    	}
    	else {
    		Session::flash('error', 'Problemas ao cadastrar recebimento. Tente novamente.');
    		return redirect('/contas-receber/adicionar')->withInput();
    	}
    }

    public function edit($id) {
        $formasPagamentos = FormaPagamento::orderBy('nome', 'asc')->get();
        $contaReceber = ContaReceber::find($id);
        return view('contas_receber.edit', compact('formasPagamentos', 'contaReceber'));
    }

    public function update(Request $request, $id) {
        $dados = $request->all();
        $dados['data'] = convertDateDb($dados['data']);
        $dados['valor'] = convertDecimalDb($dados['valor']);

        $contaReceber = ContaReceber::find($id);

        if($contaReceber->update($dados)) {
            Session::flash('success', 'Recebimento atualizado com sucesso.');
            return redirect('/contas-receber');
        }
        else {
            Session::flash('error', 'Problemas ao atualizar recebimento. Tente novamente.');
            return redirect('/contas-receber/editar/' . $id);
        }
    }

    public function delete($id) {
        $contaReceber = ContaReceber::find($id);

        if($contaReceber->delete()) {
            Session::flash('success', 'Recebimento excluído.');
        }
        else {
            Session::flash('error', 'Problemas ao excluir recebimento. Tente novamente.');
        }

        return redirect('/contas-receber');
    }
}
