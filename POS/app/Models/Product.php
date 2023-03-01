<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'category_id', 'description', 'quantity', 'price', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
