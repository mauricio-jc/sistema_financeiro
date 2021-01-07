@extends('layouts.app')

@section('content')
	<h2>
		Contas a pagar
		<a href="{{ url('/admin/contas-pagar/adicionar') }}" class="btn btn-success pull-right">
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

	<div class="row">
		<form action="{{ url('/admin/contas-pagar') }}" method="get">
			<div class="form-group col-md-3">
				<label>Data inicial:</label>
				<input type="text" name="data_ini" class="form-control data">
			</div>

			<div class="form-group col-md-3">
				<label>Data final:</label>
				<input type="text" name="data_fim" class="form-control data">
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

			<div class="form-group col-md-3">
				<label>Situação:</label>
				<select name="situacao" class="form-control">
					<option value="Todos">Todos</option>
					<option value="Aberto">Aberto</option>
					<option value="Pago">Pago</option>
				</select>
			</div>

			<div class="form-group col-md-12">
				<button type="submit" class="btn btn-info">
					<i class="fa fa-search" aria-hidden="true"></i> Pesquisar
				</button>
			</div>
		</form>
	</div>

	<div class="table-responsive">
		<a href="{{ url('/admin/contas-pagar') }}">
			<i class="fa fa-refresh" aria-hidden="true"></i> Listar todos
		</a>
		<table class="table table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th>Data</th>
					<th>Valor</th>
					<th>Forma de pagamento</th>
					<th>Situação</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($contasPagar as $contaPagar)
				<tr>
					<td>{{ convertDateScreen($contaPagar->data) }}</td>
					<td>R$ {{ formatCoin($contaPagar->valor) }}</td>
					<td>{{ $contaPagar->forma_pagamento }}</td>
					<td>{{ $contaPagar->situacao }}</td>
					<td>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#conta-{{ $contaPagar->id }}">
							<i class="fa fa-eye" aria-hidden="true"></i> Informações
						</button>

						<a href="{{ url('/admin/contas-pagar/editar/' . $contaPagar->id) }}" class="btn btn-primary">
							<i class="fa fa-pencil" aria-hidden="true"></i> Editar
						</a>

						<a href="{{ url('/admin/contas-pagar/excluir/' . $contaPagar->id) }}" class="btn btn-danger" onclick="return confirm('Deseja excluir este recebimento?');">
							<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
						</a>
					</td>
				</tr>

				<div class="modal fade" id="conta-{{ $contaPagar->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  		<div class="modal-dialog" role="document">
			    		<div class="modal-content">
		      				<div class="modal-header">
		        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        			<h4 class="modal-title" id="myModalLabel">Informações</h4>
		    	  			</div>
		      				<div class="modal-body">
		      					<p>
		      						<strong>Data: </strong> {{ convertDateScreen($contaPagar->data) }}
		      					</p>
		      					<p>
		      						<strong>Valor: </strong> R$ {{ formatCoin($contaPagar->valor) }}
		      					</p>
		      					<p>
		      						<strong>Forma de pagamento: </strong> {{ $contaPagar->forma_pagamento }}
		      					</p>
		      					<p>
		      						<strong>Situação: </strong> {{ $contaPagar->situacao }}
		      					</p>
		      					<p>
		      						<strong>Observações: </strong> {{ $contaPagar->observacoes }}
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

	<div class="text-center">
		<?php 
			if(empty($dadosGet) || (sizeof($dadosGet) == 1 && array_key_exists("page", $dadosGet))) {
				echo $contasPagar->render();
			}
			else {
				echo $contasPagar->appends([
					'data_ini' => $dadosGet['data_ini'],
					'data_fim' => $dadosGet['data_fim'],
					'forma_pagamento' => $dadosGet['forma_pagamento'],
					'situacao' => $dadosGet['situacao']
				])->render();
			}
		?>
	</div>
@endsection