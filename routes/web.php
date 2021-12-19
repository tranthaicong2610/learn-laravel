<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get
("/hello",function(){
    return "xin chao";
});
Route::get("hello/ok",function(){
    echo "<h1>chao cai gi </h1>";
});
Route::get("/name/{name}",function($name){// truyen tham so tren url
    echo "ten ban la :".$name;
})->where(['name'=>'[a-z]+']);//regular expression
