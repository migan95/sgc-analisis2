<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    public $timestamps = false;

    protected $fillable = [
        'sku',
        'nombre_producto',
        'descrip_producto',
        'id_categoria',
        'id_marca',
        'id_proveedor',
        'precio_compra',
        'precio_productos',
        'num_existencias',
        'imagen'
    ];
}
