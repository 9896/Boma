<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * fillable property
     * It ensures that fields listed in the array qualify for mass assignmnent
     * @var array
     */
    protected $fillable = ['title', 'description', 'user_id', 'county', 'sub_county', 'negotiable', 
                            'phone_number', 'plan', 'product_for', 'category'];

    /**
     * This method defines the relationship a product has with its images
     */
    public function productImagePath()
    {
        return $this->hasMany(App\Models\productImagePath::class);
    }

    /**
     * This method defines the relationship product has with a user
     * 
     */
    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }
}
