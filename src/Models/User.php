<?php
namespace src\Models;

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model {

    protected $hidden = ['password'];

    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'token',
        'numero_default'
    ];

    public function getEmail()
    {
    	return $this->email;
    }

    public function getPassword()
    {
    	return $this->password;
    }

    public function getToken()
    {
    	return $this->token;
    }

    public function getNumero_default()
    {
    	return $this->numero_default;
    }

    /* public function dato()
    {
        return $this->hasOne('mvc\Models\Dato', 'registro_id');
    } */
}