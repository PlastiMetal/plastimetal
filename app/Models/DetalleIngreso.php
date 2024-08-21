<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    use HasFactory;

    protected $table = 'detalle_ingreso';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $filiable = [
        'cantidad',
        'precio_compra',
        'precio_venta',
        'ingreso_id',
        'producto_id',
    ];
}
