<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'pharmacy_product')->withPivot('quantity','price')->withTimestamps();
    }
}
