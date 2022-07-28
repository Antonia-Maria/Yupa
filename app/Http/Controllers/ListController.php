<?php

namespace App\Http\Controllers;

use App\Models\Product;

//use Illuminate\Http\Request;
//use Illuminate\Pagination\Paginator;
//use Illuminate\Support\Facades\DB;

class ListController extends Controller
{

    /**
     * Display Product page.
     *
     */
    public function list()
    {
        $products = Product::query()
            ->select('name', 'status', 'price', 'image')
            ->leftJoin('product_images', 'products.id', '=', 'product_id')
            ->orderBy('name')
            ->paginate(10);


        return view('welcome', compact('products'));


    }

}
