<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function Hello()
    {
        echo "xin chao ban vua goi controller";
    }
    // nhan tham so tu route
    public function thamso($name)
    {
        echo "tham so chuyen :".$name;
    }
    // goi sang 1 route khac
    public function chuyen_route()
    {
        return redirect()->route('route2');
    }
}
