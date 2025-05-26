<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contato extends Model
{
    protected $fillable = [
        'Nome',
        'idade',
        'telefone',
        'email', 
    ]
}
