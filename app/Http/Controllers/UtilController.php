<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UtilController extends Controller
{
	public static function verificaCamposGet(array $dadosGet) {
        if(array_key_exists('name', $dadosGet)) {
        	if($dadosGet['name'] == '') {
        		$dadosGet['name'] = '';
        	}
        }

        if(array_key_exists('nome', $dadosGet)) {
        	if($dadosGet['nome'] == '') {
        		$dadosGet['nome'] = '';
        	}
        }

        if(array_key_exists('categoria_id', $dadosGet)) {
        	if($dadosGet['categoria_id'] == '') {
        		$dadosGet['categoria_id'] = '';
        	}
        }

        if(array_key_exists('destaque', $dadosGet)) {
        	if($dadosGet['destaque'] == '') {
        		$dadosGet['destaque'] = '';
        	}
        }

        if(array_key_exists('data_ini', $dadosGet)) {
            if($dadosGet['data_ini'] == '') {
                $dadosGet['data_ini'] = '';
            }
        }

        if(array_key_exists('data_fim', $dadosGet)) {
            if($dadosGet['data_fim'] == '') {
                $dadosGet['data_fim'] = '';
            }
        }

        return $dadosGet;
    }
}