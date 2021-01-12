<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaReceber extends Model
{
    protected $table = 'contas_receber';
    protected $fillable = ['cliente', 'data', 'valor', 'forma_pagamento', 'observacoes'];
}
