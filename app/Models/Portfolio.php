<?php namespace App\Models;
   
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {
    protected $table = 'portfolio';
    protected $fillable = [
		'titulo_corto',
		'titulo_completo',
		'texto',
	];

    public static $rules = [
        'titulo_corto' => 'string|max:255|required',
        'titulo_completo' => 'string|max:255|required',
        'texto' => 'string|required',

    ];

    
}