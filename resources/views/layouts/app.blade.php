<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema Financeiro</title>
    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/sb-admin.css?' . strtotime(date('Y-m-d H:i:s'))) }}">
    <link href="{{ url('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="mae">
        <div class="pelicula">
            <div id="carregando">
                <img src="{{ url('/images/load.gif') }}" alt="Carregando" width="100%" height="100%">
            </div>
        </div>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">Sistema Financeiro</a>
                </div>
                <ul class="nav navbar-right top-nav">
                    <li>
                        <a href="#">Olá Usuário</a>
                    </li>
                </ul>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="{{ url('/') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/caixa') }}"><i class="fa fa-fw fa-usd"></i> Caixa</a>
                        </li>
                        <li>
                            <a href="{{ url('/contas-receber') }}"><i class="fa fa-fw fa-usd"></i> Contas a receber</a>
                        </li>
                        <li>
                            <a href="{{ url('/contas-pagar') }}"><i class="fa fa-fw fa-usd"></i> Contas a pagar</a>
                        </li>
                        <li>
                            <a href="{{ url('/relatorios') }}"><i class="fa fa-fw fa-file-text-o"></i> Relatórios</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ url('/js/jquery.min.js') }}"></script>
    <script src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/js/jqueryMask.js') }}"></script>
    <script src="{{ url('/js/maskMoney.js') }}"></script>
    <script src="{{ url('/js/util.js?' . strtotime(date('Y-m-d H:i:s'))) }}"></script>
</body>
</html>