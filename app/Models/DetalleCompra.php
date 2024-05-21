<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    
    protected $table = 'detalle_compras';

    

    protected $primaryKey = 'id_detalle_compra';

    protected $fillable = [
        'id_compra', 'id_producto', 'cantidad', 'precio_compra',
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
