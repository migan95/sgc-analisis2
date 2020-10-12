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
        'nombre_producto',
        'descrip_producto',
        'id_proveedor',
        'num_existencias',
        'precio_productos'
    ];
}
