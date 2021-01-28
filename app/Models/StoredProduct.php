<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
use App\Models\Product;

class StoredProduct extends Model
{
    use HasFactory;
    protected $table = 'stored_product';
    protected $primaryKey = 'product_url';
    protected $casts = [
        'product_url' => 'string',
    ];
    protected $fillable = ['product_url', 'base_url', 'sku'];
    public $timestamps = false;

    public function Product() {
        return $this->belongsTo(Product::class);
    }    
    public function Store() {
        return $this->belongsTo(Store::class);
    }
    public function GetStoreName($base_url) {
        $storee = Store::find($base_url);
        $name = $storee->name;
        return $name;
    }
    public function GetProductName($sku) {
        $prod = Product::find($sku);
        $name = $prod->name;
        return $name;
    }
}
