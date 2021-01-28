<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUrl extends Model
{
    use HasFactory;
    protected $table = 'producttourl';
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'int',
    ];
    protected $fillable = ['sku', 'url', 'description'];
    public $timestamps = false;

    public function Product() {
        return $this->belongsTo(Product::class);
    }    
    public function URL() {
        return $this->belongsTo(URl::class);
    }
    public function GetUrlName($url) {
        $storee = URL::find($url);
        $name = $storee->name;
        return $name;
    }
    public function GetProductName($sku) {
        $prod = Product::find($sku);
        $name = $prod->name;
        return $name;
    }
}
