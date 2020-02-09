<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $comentarioID
 * @property string $contenido
 * @property int $productoID
 * @property int $usuarioID
 * @property Producto $producto
 * @property Usuario $usuario
 */
class Comentarios extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'comentarioID';

    /**
     * @var array
     */
    protected $fillable = ['contenido', 'productoID', 'usuarioID'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'productoID', 'idProducto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuarios', 'usuarioID', 'id_usuario');
    }
}
