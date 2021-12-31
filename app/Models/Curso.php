<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable =[
        'nome',
        'avaliacao'
    ];

    public function modulos()
    {
        return $this -> hasMany(Modulo::class);
    }
}
