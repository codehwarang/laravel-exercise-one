<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'url',
        'is_thumbnail'
    ];

    protected function fullUrl(): Attribute
    {
        return Attribute::get(function (string $value) {
            return Storage::url($value);
        });
    }
}
