<?php

namespace App;

use Carbon\Carbon;
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
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pedidos';

    protected $dates = ['fechaPedido'];

    public function setFechaAttribute($value)
    {
        //esta función toma una string para guardar en la base de datos
        $this->attributes['fechaPedido'] = (new Carbon($value))->format('Y-m-d H:m:s');
    }
    //esta función toma la info de la DDBB y lo muestra
    public function getFechaAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:m');
    }
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
        return $this->belongsTo('App\Usuario', 'id_usuario', 'id_usuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePedidos()
    {
        return $this->hasMany('App\DetallePedido', 'id_pedido', 'id_pedido');
    }
}
