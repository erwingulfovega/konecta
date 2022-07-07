<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    protected $table = 'factura_detalle';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
