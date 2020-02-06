<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_detallepedido
 * @property int $id_pedido
 * @property int $id_producto
 * @property int $cantidad
 * @property int $precioProducto
 * @property Pedido $pedido
 * @property Producto $producto
 */
class DetallePedido extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detalle_pedido';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_detallepedido';

    /**
     * @var array
     */
    protected $fillable = ['id_pedido', 'id_producto', 'cantidad', 'precioProducto'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo('App\Pedido', 'id_pedido', 'id_pedido');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_producto', 'idProducto');
    }
}
