<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\URL;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'sku';
    protected $casts = ['sku' => 'string',];
    protected $fillable = ['sku','name', 'description', 'price'];
    public $timestamps = false;

    public function URLs()
    {
        return $this->belongsToMany('App\Models\URL','urltoproduct','sku','url')->withPivot('description');
    }
}
