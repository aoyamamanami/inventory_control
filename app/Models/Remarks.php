<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Remarks extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $table = 'remarks';
    
    protected $fillable = ['body'];
    
    
}