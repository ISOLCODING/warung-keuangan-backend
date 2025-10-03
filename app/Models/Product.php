<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'code',
        'price',
        'stock',
        'min_stock',
        'description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'min_stock' => 'integer',
    ];

    /**
     * Relasi ke Category
     * Many Products belong to one Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke TransactionDetail
     * One Product has many TransactionDetails
     */
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
