<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = ['name'];
    
    public $timestamps = false;
    
    public function products()
    {
        return $this->hasMany(Product::class);
        
    }
    
    public function getByCategory(int $limit_count = 5)
    {
        return $this->products()->with('category')->orderBy('updated_at', 'ASC')->paginate($limit_count);
    }
}
