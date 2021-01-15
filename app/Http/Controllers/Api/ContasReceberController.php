<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContaReceber;

class ContasReceberController extends Controller
{
    public function index() {
    	$contasReceber = ContaReceber::orderBy('id', 'DESC')->get();

    	foreach ($contasReceber as $key => $value) {
    		$value->data = convertDateScreen($value->data);
    		$value->valor = formatCoin($value->valor);
    	}

    	return response()->json($contasReceber);
    }
}
