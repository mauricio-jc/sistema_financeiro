@extends('layouts.app')

@section('content')
	<h2>
		Editar conta a receber
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

	<form action="{{ url('/contas-receber/atualizar/' . $contaReceber->id) }}" method="post" class="row">
		@csrf

		<div class="form-group col-md-8">
			<label>Cliente: *</label>
			<input type="text" name="cliente" class="form-control" value="{{ $contaReceber->cliente }}" required>
		</div>

		<div class="form-group col-md-4">
			<label>Data: *</label>
			<input type="text" name="data" class="form-control data" value="{{ convertDateScreen($contaReceber->data) }}" required>
		</div>

		<div class="form-group col-md-4">
			<label>Valor: *</label>
			<input type="text" name="valor" class="form-control decimal" value="{{ formatCoin($contaReceber->valor) }}" required>
		</div>

		<div class="form-group col-md-4">
			<label>Forma de pagamento: *</label>
			<select name="forma_pagamento" class="form-control" required>
				@foreach($formasPagamentos as $formaPagamento)
				<option value="{{ $formaPagamento->nome }}" <?php echo ($formaPagamento->nome == $contaReceber->forma_pagamento ? 'selected' : ''); ?>>{{ $formaPagamento->nome }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group col-md-4">
			<label>Situação: *</label>
			<select name="situacao" class="form-control" required>
				<option value="Aberto" <?php echo ($contaReceber->situacao == 'Aberto' ? 'selected' : ''); ?>>Aberto</option>
				<option value="Recebido" <?php echo ($contaReceber->situacao == 'Recebido' ? 'selected' : ''); ?>>Recebido</option>
			</select>
		</div>

		<div class="form-group col-md-12">
			<label>Observações: </label>
			<textarea name="observacoes" class="form-control" cols="30" rows="5">{{ $contaReceber->observacoes }}</textarea>
		</div>

		<div class="form-group col-md-12">
			<button type="submit" class="btn btn-primary primary-back">
				<i class="fa fa-refresh" aria-hidden="true"></i> Atualizar
			</button>
		</div>
	</form>
@endsection