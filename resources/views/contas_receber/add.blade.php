@extends('layouts.app')

@section('content')

	<h2>
        Adicionar conta a receber
        <a href="{{ url('/contas-receber') }}" class="btn btn-success pull-right">
            <i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar
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

	<form action="{{ url('/contas-receber/salvar') }}" method="post" class="row">
		@csrf

		<div class="form-group col-md-12">
			<label>Cliente: *</label>
			<input type="text" name="cliente" class="form-control" required>
		</div>

		<div class="form-group col-md-4">
			<label>Data: *</label>
			<input type="text" name="data" class="form-control data" required>
		</div>

		<div class="form-group col-md-4">
			<label>Valor: *</label>
			<input type="text" name="valor" class="form-control decimal" required>
		</div>

		<div class="form-group col-md-4">
			<label>Forma de pagamento: *</label>
			<select name="forma_pagamento" class="form-control" required>
				@foreach($formasPagamentos as $formaPagamento)
				<option value="{{ $formaPagamento->nome }}">{{ $formaPagamento->nome }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group col-md-12">
			<label>Observações:</label>
			<textarea name="observacoes" class="form-control" cols="30" rows="5"></textarea>
		</div>
		
		<div class="form-group col-md-12">
			<button type="submit" class="btn btn-primary primary-back">
				<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar
			</button>
		</div>
	</form>

@endsection