<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Relatório de contas a receber</title>
	    <link rel="stylesheet" href="<?php echo public_path() . '/bootstrap/css/bootstrap.min.css'; ?>">
	</head>
	<body>
		<h3>Contas a receber</h3>

		<hr>

		<table class="table table-bordered table-hover table-sm" style="margin-bottom: 40px;">
			<thead>
				<tr>
					<th style="font-size: 11px; width: 10%; text-align: center;">Código</th>
					<th style="font-size: 11px; width: 40%;">Cliente</th>
					<th style="font-size: 11px; width: 10%; text-align: center;">Data</th>
					<th style="font-size: 11px; width: 20%; text-align: center;">Valor</th>
					<th style="font-size: 11px; width: 20%; text-align: center;">Forma de pagamento</th>
				</tr>
			</thead>
			<tbody>
				@foreach($contasReceber as $contaReceber)
				<tr>
					<td style="font-size: 11px; text-align: center;">{{ $contaReceber->id }}</td>
					<td style="font-size: 11px;">{{ $contaReceber->cliente }}</td>
					<td style="font-size: 11px; text-align: center;">{{ convertDateScreen($contaReceber->data) }}</td>
					<td style="font-size: 11px; text-align: center;">R$ {{ formatCoin($contaReceber->valor) }}</td>
					<td style="font-size: 11px; text-align: center;">{{ $contaReceber->forma_pagamento }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</html>