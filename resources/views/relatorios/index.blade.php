@extends('layouts.app')

@section('content')

	<h2>Relatórios</h2>
	<hr>

    <div class="row">
        <h4 class="col-md-6">Contas a receber</h4>
        <p class="col-md-6">
            <a href="{{ url('/relatorios/print/contas_receber') }}" class="btn btn-success" target="_blank">
                <i class="fa fa-print" aria-hidden="true"></i> Imprimir
            </a>
        </p>

        <div class="col-md-12">
            <hr>
        </div>

        <h4 class="col-md-6">Contas a pagar</h4>
        <p class="col-md-6">
            <a href="{{ url('/relatorios/print/contas_pagar') }}" class="btn btn-success" target="_blank">
                <i class="fa fa-print" aria-hidden="true"></i> Imprimir
            </a>
        </p>

        <div class="col-md-12">
            <hr>
        </div>
    </div>
@endsection