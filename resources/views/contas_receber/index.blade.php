@extends('layouts.app')

@section('content')

	<h2>
        Contas a receber
        <a href="{{ url('/contas-receber/adicionar') }}" class="btn btn-success pull-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Adicionar
        </a>
    </h2>
	<hr>

    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('success') }}
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('error') }}
    </div>
    @endif

	<div class="panel panel-default">
  		<div class="panel-body">
    		<form action="{{ url('/contas-receber') }}" method="get">
    			<div class="form-group col-md-1">
    				<label>Cód.:</label>
    				<input type="text" name="codigo" class="form-control">
    			</div>

    			<div class="form-group col-md-6">
    				<label>Cliente:</label>
    				<input type="text" name="cliente" class="form-control">
    			</div>

    			<div class="form-group col-md-3">
    				<label>Forma de pagamento:</label>
    				<select name="forma_pagamento" class="form-control">
    					<option value="Todos">Todos</option>
    					@foreach($formasPagamentos as $formaPagamento)
    					<option value="{{ $formaPagamento->nome }}">{{ $formaPagamento->nome }}</option>
    					@endforeach
    				</select>
    			</div>

    			<div class="form-group col-md-2">
    				<button type="submit" class="btn btn-info margin-top">
    					<i class="fa fa-search" aria-hidden="true"></i> Pesquisar
    				</button>
    			</div>
    		</form>
  		</div>
	</div>

	<div class="table-responsive">
        <a href="{{ url('/contas-receber') }}">
            <i class="fa fa-refresh" aria-hidden="true"></i> Listar todos
        </a>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th class="text-center">Código</th>
					<th>Cliente</th>
					<th class="text-center">Data</th>
					<th class="text-center">Valor</th>
					<th>Forma de pagamento</th>
                    <th width="150px">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($contasReceber as $contaReceber)
                <tr>
                    <td class="text-center">{{ $contaReceber->id }}</td>
                    <td>{{ $contaReceber->cliente }}</td>
                    <td class="text-center">{{ convertDateScreen($contaReceber->data) }}</td>
                    <td class="text-center">R$ {{ formatCoin($contaReceber->valor) }}</td>
                    <td>{{ $contaReceber->forma_pagamento }}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#receber-{{ $contaReceber->id }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>

                        <a href="{{ url('/contas-receber/editar/' . $contaReceber->id) }}" class="btn btn-primary primary-back">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('/contas-receber/excluir/' . $contaReceber->id) }}" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>

                <div class="modal fade" id="receber-{{ $contaReceber->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Recebimento #{{ $contaReceber->id }}</h4>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <strong>Cliente:</strong> {{ $contaReceber->cliente }}
                                </p>
                                <p>
                                    <strong>Data:</strong> {{ convertDateScreen($contaReceber->data) }}
                                </p>
                                <p>
                                    <strong>Valor:</strong> R$ {{ formatCoin($contaReceber->valor) }}
                                </p>
                                <p>
                                    <strong>Forma de pagamento:</strong> {{ $contaReceber->forma_pagamento }}
                                </p>
                                <p>
                                    <strong>Observações:</strong> {{ $contaReceber->observacoes }}
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection