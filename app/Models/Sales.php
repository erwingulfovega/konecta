<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'factura';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}