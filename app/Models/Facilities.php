<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $table = 'facilities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'image', 'description'
    ];
}
