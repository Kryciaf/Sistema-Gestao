<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';
    protected $fillable = [
        'nome',
        'uf',
        'email'
    ];

    public function produto() {
        return $this->hasMany('App\Models\Produto', 'fornecedor_id', 'id');
    }
}
