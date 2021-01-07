@extends('layouts.app')

@section('content')

    <h1 class="primary-color">Saldo: R$ 11.097,25</h1>
    <hr>

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-card">
                <div class="panel-heading">
                    <a href="{{ url('/caixa') }}" style="text-decoration: none;">
                        <div class="row">
                            <div class="text-center" style="padding-top: 30px; padding-bottom: 30px;">
                                <i class="fa fa-usd fa-5x" aria-hidden="true"></i>
                                <h2>Caixa</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-card">
                <div class="panel-heading">
                    <a href="{{ url('/contas-receber') }}" style="text-decoration: none;">
                        <div class="row">
                            <div class="text-center" style="padding-top: 30px; padding-bottom: 30px;">
                                <i class="fa fa-usd fa-5x" aria-hidden="true"></i>
                                <h2>Contas a receber</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-card">
                <div class="panel-heading">
                    <a href="{{ url('/contas-pagar') }}" style="text-decoration: none;">
                        <div class="row">
                            <div class="text-center" style="padding-top: 30px; padding-bottom: 30px;">
                                <i class="fa fa-usd fa-5x" aria-hidden="true"></i>
                                <h2>Contas a pagar</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-card">
                <div class="panel-heading">
                    <a href="{{ url('/relatorios') }}" style="text-decoration: none;">
                        <div class="row">
                            <div class="text-center" style="padding-top: 30px; padding-bottom: 30px;">
                                <i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i>
                                <h2>Relatórios</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection