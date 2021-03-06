<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id_usuario
 * @property string $nick
 * @property string $passwd
 * @property string $rol
 * @property Pedido[] $pedidos
 */
class Usuarios extends Authenticatable implements JWTSubject
{
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
    public function pedidos()
    {
        return $this->hasMany('App\Pedido', 'id_usuario', 'id_usuario');
    }
    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'usuarioID', 'id_usuario');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        //vamos a emular que si un usuario es: "luo" pasa
        //si es otro no pasa
        $rol = $this->rol;
        //lo que pongamos en este array se agrega al tokey
        return [
            'rol' => $rol,
        ];
    }
}
