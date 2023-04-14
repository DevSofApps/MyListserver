<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function itens()
    {
        return $this->hasMany(Item::class);
    }
}
