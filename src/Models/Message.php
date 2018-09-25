<?php
namespace src\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Message extends Model {

    protected $table = 'msg';

    protected $fillable = [
        'msg',
        'numero',
        'counter',
        'link',
        'users_id'
    ];

    public function getNumero_default()
    {
    	return $this->numero_default;
    }

}