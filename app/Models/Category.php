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
    
    protected $fillable = [
        'name',
        'user_id'
    ];
    
    protected static function booted()
    {
        static::deleting(function($category){
            $category->products()->delete();
        });
    }
    
    public $timestamps = false;
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getByCategory(int $limit_count = 5)
    {
        return $this->products()->with('category')->orderBy('updated_at', 'ASC')->paginate($limit_count);
    }
}
