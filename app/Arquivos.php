<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivos extends Model
{
    protected $table = 'arquivos';
    protected $fillable = ['descricao','url'];
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
