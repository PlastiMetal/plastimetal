<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $filiable = [
        'categoria_id',
        'codigo',
        'stock',
        'descripcion',
        'imagen',
        'estatus',
    ];
}
