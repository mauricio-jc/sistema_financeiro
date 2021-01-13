<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContaReceber;
use App\ContaPagar;

class HomeController extends Controller
{
    public function index() {
    	$receitas = ContaReceber::sum('valor');
    	$saidas = ContaPagar::sum('valor');
    	$saldo = $receitas - $saidas;
    	return view('index', compact('receitas', 'saidas', 'saldo'));
    }
}
