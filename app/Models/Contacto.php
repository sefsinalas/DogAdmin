<?php namespace App\Models;
   
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model {
    protected $table = 'contacto';
    protected $fillable = [
		'email',
		'dirección',
		'localidad',
		'url__facebook',
		'url__behance',
		'url__vimeo',
		'url__pinterest',
		'url__linked_in',
	];

    public static $rules = [
        'email' => 'string|max:255|required',
        'dirección' => 'string|max:255|required',
        'localidad' => 'string|max:255|required',
        'url__facebook' => 'string|max:255|required',
        'url__behance' => 'string|max:255|required',
        'url__vimeo' => 'string|max:255|required',
        'url__pinterest' => 'string|max:255|required',
        'url__linked_in' => 'string|max:255|required',

    ];

    
}