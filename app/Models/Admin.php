<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ILLuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;
    
        protected $table = 'products';
    
        protected $fillable = [
            'category_id',
            'name',
            'quantity',
            'user_id',
        ];
        
        public function products()
        {
            $products = Admin::all();
            return view('admins.index')->with('products',$products);
        }
        //DESCは降順。updated_atで並べた後、limitで件数制限をかける
        /*public function getPaginateByLimit(int $limit_count = 150)
        {
        return $this::with('category')->orderBy('updated_at', 'ASC')->paginate($limit_count);
        }*/
        
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
}