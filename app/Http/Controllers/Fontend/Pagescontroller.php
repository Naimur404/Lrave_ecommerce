<?php

namespace App\Http\Controllers\Fontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Pagescontroller extends Controller
{
    public function index(){
        return view('pages.index');
    }
}

