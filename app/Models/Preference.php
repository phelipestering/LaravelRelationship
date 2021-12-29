<?php

namespace App\Models;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Preference extends Model
{
    use HasFactory;


#criando atributo para permitir que sejam inseridos dados na tabela migrations

protected $fillable = [
    # insira os campos que quer que sejam preenchidos
    'user_id',
    'notify_emails',
    'notify',
    'background_color'
];


    ## one to one inverso

    public function user()
    {
        return $this->belongsTo(User::class); ## para relacionamento inverso, use o belongs to apontando para
                                              ## a tabela forte
    }
}
