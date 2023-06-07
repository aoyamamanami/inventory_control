<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function products()
    {
        return $this->hasMany(Product::class);
        
    }
    
    public function getByCategory(int $limit_count = 5)
    {
        return $this->products()->with('category')->orderBy('updated_at', 'ASC')->paginate($limit_count);
    }
}
