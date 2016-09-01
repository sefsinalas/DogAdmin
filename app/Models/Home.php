<?php namespace App\Models;
   
use Illuminate\Database\Eloquent\Model;

class Home extends Model {
    protected $table = 'home';
    protected $fillable = [
		'titulo_principal',
		'titulo_2',
		'texto',
	];

    public static $rules = [
        'titulo_principal' => 'string|max:255|required',
        'titulo_2' => 'string|max:255|required',
        'texto' => 'string|required',

    ];

    
}