<?php namespace App\Models;
   
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model {
    protected $table = 'servicios';
    protected $fillable = [
		'titulo',
	];

    public static $rules = [
        'titulo' => 'string|max:255|required',

    ];

    
}