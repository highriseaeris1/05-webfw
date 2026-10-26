<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'code',
        'name',
        'unit',
        'price',
        'stock',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    // accessor untuk memformat harga ke rupiah, diakses lewat $product->price_rupiah
    protected function priceRupiah(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => 'Rp ' . number_format($attributes['price'] ?? 0, 0, ',', '.'),
        );
    }
}
