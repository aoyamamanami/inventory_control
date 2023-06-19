<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Chart;
use App\Http\Controllers\AdminController;


class ChartController extends Controller
{
    public function chart(Chart $chart){ 
        $charts = Chart::select('product_code', 'name', 'created_at')->get();
        return view('admins/chart',["chart" => $charts]);
    }
    
}
