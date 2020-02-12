<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id_usuario
 * @property string $nick
 * @property string $passwd
 * @property string $rol
 * @property Carrito[] $carritos
 * @property Comentario[] $comentarios
 */
class Usuario extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        //vamos a emular que si un usuario es: "luo" pasa
        //si es otro no pasa
        if( $this->nick == 'cristian100'){
            $rol = 'admin';
        }else{
            $rol = 'usuario';
        }
        //lo que pongamos en este array se agrega al tokey
        return[
            'rol' => $rol,
        ];
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_usuario';

    /**
     * @var array
     */
    protected $fillable = ['nick', 'passwd', 'rol'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carritos()
    {
        return $this->hasMany('App\Carrito', 'id_usuario', 'id_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'usuarioID', 'id_usuario');
    }
}
