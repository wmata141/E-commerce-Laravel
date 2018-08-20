<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $all_published_product=DB::table('tbl_products')
                ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')                    
                ->select('tbl_products.*','tbl_category.category_name')
                ->where('tbl_products.publication_status', 1)
                ->limit(9)
                ->get();
        $manage_published_product=view('pages.home_content')
            ->with('all_published_product',$all_published_product);
        return view('layout')
            ->with('pages.home_content',$manage_published_product);
    }
}
