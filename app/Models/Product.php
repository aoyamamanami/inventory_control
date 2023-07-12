<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    
        // protected $table = 'products';
    
        protected $fillable = [
            'category_id',
            'name',
            'unit_price',
            'quantity',
            'product_code',
            'company',
            'user_id'
        ];
        

        
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
        
        public function chart()
        {
            return $this->hasMany(Chart::class);
        }
        
        public function user()
        {
            return $this->belongsTo(User::class);
        }
        
        
        
        
        
}