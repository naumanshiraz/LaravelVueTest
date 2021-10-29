<?php

namespace App\Http\Controllers\Api;

use App\Goods;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('home')->with('auth_user',  auth()->user());
    }

}
