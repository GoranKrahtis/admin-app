<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'store';
    protected $primaryKey = 'base_url';
    protected $casts = [
        'base_url' => 'string',
    ];
    protected $fillable = ['base_url', 'name', 'code', 'description'];
    public $timestamps = false;
}
