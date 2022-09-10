<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedor;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id'
    ];

    public function fornecedor() {
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function pedidos() {
        return $this->belongsToMany('App\Models\Pedido', 'pedido_produtos');
    }
}
