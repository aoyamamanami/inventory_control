<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ILLuminate\Support\Facades\DB;
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
        ];
        

        
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
        
        
        
        
}