<?php

use App\Http\Controllers\MyController;
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
Route::get("name/{name}",function($name){// truyen tham so tren url
    echo "ten ban la :".$name;
})->where(['name'=>'[a-z]+']);//regular expression
// dinh danh (dat ten)
Route::get("dinhdanh",['as'=>'myroute',function(){
    echo "dinh danh cho route";
}]);
Route::get("dinhdanh2",function(){
    echo "ban da dat ten ";
})->name("route2");

// goi ten
Route::get("goiten",function(){
    return redirect()->route("route2");
});
// nhom route
Route::group(['prefix'=>'myroute'],function(){
    route::get("user1",function(){
        echo "user1";
    });
    route::get("user2",function(){
        echo "user2";
    });

});

// goi controller
Route::get('/goi', [MyController::class, 'Hello']);
