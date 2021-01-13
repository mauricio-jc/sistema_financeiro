@extends('layouts.app')

@section('content')
	<h2>Caixa</h2>
	<hr>

	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-success">
	  			<div class="panel-heading">Entradas</div>
				<div class="panel-body">
					<p class="text-success">
						<strong>Dinheiro: R$ {{ formatCoin($valoresReceber['totalDinheiro']) }}</strong>
					</p>
					<p class="text-success">
						<strong>Boleto: R$ {{ formatCoin($valoresReceber['totalBoleto']) }}</strong>
					</p>
					<p class="text-success">
						<strong>Cartão de crédito: R$ {{ formatCoin($valoresReceber['totalCartaoCredito']) }}</strong>
					</p>
					<p class="text-success">
						<strong>Cartão de débito: R$ {{ formatCoin($valoresReceber['totalCartaoDebito']) }}</strong>
					</p>
					<p class="text-success">
						<strong>Transferência bancária: R$ {{ formatCoin($valoresReceber['totalTransferenciaBancaria']) }}</strong>
					</p>
					<h4 class="text-success">
						<strong>Total: R$ {{ formatCoin($valoresReceber['total']) }}</strong>
					</h4>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-danger">
	  			<div class="panel-heading">Saídas</div>
				<div class="panel-body">
					<p class="text-danger">
						<strong>Dinheiro: R$ {{ formatCoin($valoresPagar['totalDinheiro']) }}</strong>
					</p>
					<p class="text-danger">
						<strong>Boleto: R$ {{ formatCoin($valoresPagar['totalBoleto']) }}</strong>
					</p>
					<p class="text-danger">
						<strong>Cartão de crédito: R$ {{ formatCoin($valoresPagar['totalCartaoCredito']) }}</strong>
					</p>
					<p class="text-danger">
						<strong>Cartão de débito: R$ {{ formatCoin($valoresPagar['totalCartaoDebito']) }}</strong>
					</p>
					<p class="text-danger">
						<strong>Transferência bancária: R$ {{ formatCoin($valoresPagar['totalTransferenciaBancaria']) }}</strong>
					</p>
					<h4 class="text-danger">
						<strong>Total: R$ {{ formatCoin($valoresPagar['total']) }}</strong>
					</h4>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-info">
	  			<div class="panel-heading">Saldo Final</div>
				<div class="panel-body">					
					<h4 class="text-info">
						<strong>Total: R$ {{ formatCoin($saldo) }}</strong>
					</h4>
				</div>
			</div>
		</div>
	</div>

@endsection