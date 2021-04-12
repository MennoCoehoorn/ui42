<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'vil_name',
        'mayor_name',
        'address',
        'phone',
        'fax',
        'email',
        'web',
        'image_path'
    ];
    
    use HasFactory;
}
