<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContaPagar;

class ContasPagarController extends Controller
{
    public function index() {
    	$contasPagar = ContaPagar::orderBy('id', 'DESC')->get();

    	foreach ($contasPagar as $key => $value) {
    		$value->data = convertDateScreen($value->data);
    		$value->valor = formatCoin($value->valor);
    	}

    	return response()->json($contasPagar);
    }
}
