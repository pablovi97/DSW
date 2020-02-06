<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_pedido
 * @property int $id_usuario
 * @property string $fechaPedido
 * @property Usuario $usuario
 * @property DetallePedido[] $detallePedidos
 */
class Pedidos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_pedido';

    /**
     * @var array
     */
    protected $fillable = ['id_usuario', 'fechaPedido'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuarios', 'id_usuario', 'id_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePedidos()
    {
        return $this->hasMany('App\DetallePedido', 'id_pedido', 'id_pedido');
    }
}
