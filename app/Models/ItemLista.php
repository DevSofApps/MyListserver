<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLista extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantidade',
        'preco',
        'comprado',
        'lista_id'
    ];

    public function lista()
    {
        return $this->belongsTo(Lista::class);
    }
}
