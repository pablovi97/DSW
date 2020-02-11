<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idProducto
 * @property string $nombreProducto
 * @property int $stock
 * @property string $url
 * @property int $precio
 * @property int $comentarioID
 * @property DetallePedido[] $detallePedidos
 */
class Producto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'producto';


    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idProducto';

    /**
     * @var array
     */
    protected $fillable = ['nombreProducto', 'stock', 'url', 'precio', 'comentarioID'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePedidos()
    {
        return $this->hasMany('App\DetallePedido', 'id_producto', 'idProducto');
    }
}
