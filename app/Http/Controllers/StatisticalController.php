<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function Ramsey\Uuid\v1;

class StatisticalController extends Controller
{
    public function statistical_order()
    {
        return view('admin.statistical_order');
    }

    public function statistical_product()
    {
        return view('admin.statistical_product');
    }
}
