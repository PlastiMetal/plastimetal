<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $table = 'ingreso';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $filiable = [
        'proveedor_id',
        'tipo_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estatus',
    ];
}
