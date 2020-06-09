<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $table = 'ordem_servicos';

    protected $attributes = [
        'status' => 'aberto',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
