<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImagePath extends Model
{
    use HasFactory;

    /**
     * Fillable property
     * Allows listed fields to qualify mass assignment
     * @var array
     */
    protected $fillable = ['product_id', 'product_image_path'];

    /**
     * Timestamps property
     * This property decides whether laravel will attempt to push in timestamp related data into you table
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define the relationship that exists between the products and their path
     * 
     */
    public function product()
    {
        return $this->belongsTo(App\Models\Product::class);
    }
}
