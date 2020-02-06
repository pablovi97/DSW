<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idProducto
 * @property string $nombreProducto
 * @property int $stock
 * @property string $url
 * @property int $Precio
 * @property int $comentarioID
 * @property Comentario[] $comentarios
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
    protected $fillable = ['nombreProducto', 'stock', 'url', 'Precio', 'comentarioID'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'productoID', 'idProducto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePedidos()
    {
        return $this->hasMany('App\DetallePedido', 'id_producto', 'idProducto');
    }
}
