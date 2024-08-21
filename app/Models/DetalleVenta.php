<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalle_venta';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $filiable = [
        'venta_id',
        'cantidad',
        'precio_venta',
        'descuento',
    ];

    protected $guarded = [];
}
