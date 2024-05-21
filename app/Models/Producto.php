<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre', 'descripcion', 'precio_compra', 'precio_venta', 'marca', 'id_categoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'id_producto');
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class, 'id_producto');
    }
}
