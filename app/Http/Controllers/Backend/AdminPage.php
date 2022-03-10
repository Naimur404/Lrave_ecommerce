<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class AdminPage extends Controller
{ public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.Pages.product.index');
    }
}
