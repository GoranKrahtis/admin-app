<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class URL extends Model
{
    use HasFactory;
    protected $table = 'url';
    protected $primaryKey = 'url';
    protected $casts = ['url' => 'string',];
    protected $fillable = ['url', 'name', 'description'];
    public $timestamps = false;

    public function Products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('description');
    }
}
