@extends('layouts.app')

@section('content')
	<h2>
		Nova conta a pagar
		<a href="{{ url('/admin/contas-pagar') }}" class="btn btn-success pull-right">
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

	@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

	<form action="{{ url('/admin/contas-pagar/salvar') }}" method="post" class="row">
		@csrf

		<div class="form-group col-md-3">
			<label>Data: *</label>
			<input type="text" name="data" class="form-control data" value="{{ old('data') }}" required>
		</div>

		<div class="form-group col-md-3">
			<label>Valor: *</label>
			<input type="text" name="valor" class="form-control decimal" value="{{ old('valor') }}" required>
		</div>

		<div class="form-group col-md-3">
			<label>Forma de pagamento: *</label>
			<select name="forma_pagamento" class="form-control" required>
				@foreach($formasPagamentos as $formaPagamento)
				<option value="{{ $formaPagamento->nome }}">{{ $formaPagamento->nome }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group col-md-3">
			<label>Situação: *</label>
			<select name="situacao" class="form-control" required>
				<option value="Aberto">Aberto</option>
				<option value="Pago">Pago</option>
			</select>
		</div>

		<div class="form-group col-md-12">
			<label>Observações: </label>
			<textarea name="observacoes" class="form-control" cols="30" rows="5">{{ old('observacoes') }}</textarea>
		</div>

		<div class="form-group col-md-12">
			<button type="submit" class="btn btn-success">
				<i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar
			</button>
		</div>
	</form>
@endsection