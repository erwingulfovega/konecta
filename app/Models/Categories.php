<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
