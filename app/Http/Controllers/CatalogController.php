<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CatalogController extends Controller
{
    public function index()
    {
        $response = Http::get('https://www.an-d.asia/ajax/get_catalog_list.php');

        $items = json_decode($response->body(), true);

        //dd($items);

        $products = json_decode($response->body(), true);

        return view('catalog.index', compact('products'));
    }
      
}
