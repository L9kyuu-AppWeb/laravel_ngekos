<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BoardingHouse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'thumbnail', 'city_id', 'category_id', 'description', 'price', 'address'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
