<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
// chuyen tham so
Route::get('thamso/{name}',[MyController::class,'thamso']);
// goi controlle de controller truyen sang 1 route moi
route::get('goi_controller',[MyController::class,'chuyen_route']);
//url
Route::get("goirequest",[MyController::class,'ham_request']);
// gui nhan du lieu voi request
route::get("getform",function(){
    return view('login');
});

// xu ly login
route::get("xuly",[MyController::class,'xuly'])->name("xuly");
//goi ham cookie
route::get('setCookie',[MyController::class,'set_cookie']);
route::get('getCookie',[MyController::class,'get_cookie']);

route::get("hello",[UserController::class,'index']);
// Bộ định tuyến cho phép bạn đăng ký các tuyến đáp ứng với bất kỳ động từ HTTP nào:

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

// Đôi khi bạn có thể cần đăng ký một tuyến đáp ứng với nhiều động từ HTTP.
//  Bạn có thể làm như vậy bằng cách sử dụng matchphương pháp này. Hoặc, bạn thậm chí
// có thể đăng ký một tuyến đáp ứng tất cả các động từ HTTP bằng anyphương pháp:

// Route::match(['get', 'post'], '/', function () {
//     //
// });

// Route::any('/', function () {
    //
// });
// Route::redirect('/here', '/there');
// Theo mặc định, Route::redirecttrả về 302mã trạng thái. Bạn có thể tùy chỉnh mã trạng thái bằng cách sử dụng tham số thứ ba tùy chọn:

// Route::redirect('/here', '/there', 301);
// Hoặc, bạn có thể sử dụng Route::permanentRedirectphương pháp để trả về 301mã trạng thái:

// Route::permanentRedirect('/here', '/there');
// Xem các tuyến đường
// Nếu tuyến đường của bạn chỉ cần trả về một chế độ xem , bạn có thể sử dụng Route::viewphương pháp này.
//  Giống như redirectphương pháp này, phương pháp này cung cấp một phím tắt đơn giản để bạn không phải xác định toàn bộ tuyến đường hoặc bộ điều khiển.
//   Phương viewthức chấp nhận một URI làm đối số đầu tiên của nó và một tên dạng xem là đối số thứ hai của nó.
//   Ngoài ra, bạn có thể cung cấp một mảng dữ liệu để chuyển tới dạng xem dưới dạng đối số thứ ba tùy chọn:

// Route::view('/welcome', 'welcome');

// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);


// Tham số tuyến đường
// Các thông số bắt buộc
// Đôi khi bạn sẽ cần nắm bắt các phân đoạn của URI trong tuyến đường của mình. Ví dụ: bạn có thể cần lấy ID của người dùng từ URL. Bạn có thể làm như vậy bằng cách xác định các thông số tuyến đường:

// Route::get('/user/{id}', function ($id) {
//     return 'User '.$id;
// });
// Bạn có thể xác định bao nhiêu tham số tuyến đường theo yêu cầu của tuyến đường của bạn:

// Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
//     //
// });
// Tham số tuyến đường luôn được đặt trong {}dấu ngoặc nhọn và phải bao gồm các ký tự chữ cái.
//  Dấu gạch dưới ( _) cũng được chấp nhận trong tên tham số tuyến đường. Các tham số định tuyến được đưa vào các lệnh gọi lại / bộ điều khiển tuyến dựa trên thứ tự của chúng - tên của các đối số bộ điều khiển / gọi lại tuyến không quan trọng.
route::get('/hello/{id}',function($id){
    return "hello".$id;
});
// Tham số & Tiêm phụ thuộc
// Nếu tuyến của bạn có các phần phụ thuộc mà bạn muốn vùng chứa dịch vụ Laravel tự động đưa vào lệnh gọi lại của tuyến,
//  bạn nên liệt kê các thông số tuyến sau các phần phụ thuộc của mình:
// Route::get('/user/{id}', function (Request $request, $id) {
//     return 'User '.$id;
// });
// Các thông số tùy chọn
// Đôi khi, bạn có thể cần chỉ định một tham số định tuyến có thể không phải lúc nào cũng có trong URI.
// Bạn có thể làm như vậy bằng cách đặt một ?dấu sau tên tham số. Đảm bảo cung cấp cho biến tương ứng của tuyến đường một giá trị mặc định:

Route::get('/user/{name?}', function ($name = null) {
    return $name;
});

Route::get('/user/{name?}', function ($name = 'John') {
    return $name;
});
// Ràng buộc về Cụm từ Thông dụng
// Bạn có thể giới hạn định dạng của các tham số tuyến đường của mình bằng cách sử dụng wherephương thức trên một cá thể tuyến đường. Phương wherethức chấp nhận tên của tham số và một biểu thức chính quy xác định cách tham số sẽ bị ràng buộc:

Route::get('/user/{name}', function ($name) {
    //
})->where('name', '[A-Za-z]+');

Route::get('/user/{id}', function ($id) {
    //
})->where('id', '[0-9]+');

Route::get('/user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
// Để thuận tiện, một số mẫu biểu thức chính quy thường được sử dụng có các phương thức trợ giúp cho phép bạn nhanh chóng thêm các ràng buộc mẫu vào các tuyến của mình:

Route::get('/user/{id}/{name}', function ($id, $name) {
    //
})->whereNumber('id')->whereAlpha('name');

Route::get('/user/{name}', function ($name) {
    //
})->whereAlphaNumeric('name');

Route::get('/user/{id}', function ($id) {
    //
})->whereUuid('id');
// Nếu yêu cầu đến không phù hợp với các ràng buộc của mẫu định tuyến, một phản hồi HTTP 404 sẽ được trả về.

// Ràng buộc toàn cầu
// Nếu bạn muốn tham số định tuyến luôn bị giới hạn bởi một biểu thức chính quy, bạn có thể sử dụng patternphương thức này.
// Bạn nên xác định các mẫu này trong bootphương thức của App\Providers\RouteServiceProviderlớp mình:

// /**
//  * Define your route model bindings, pattern filters, etc.
//  *
//  * @return void
//  */
// public function boot()
// {
//     Route::pattern('id', '[0-9]+');
// }
// Khi mẫu đã được xác định, nó sẽ tự động được áp dụng cho tất cả các tuyến sử dụng tên tham số đó:

// Route::get('/user/{id}', function ($id) {
//     // Only executed if {id} is numeric...
// });

// Dấu gạch chéo được mã hóa về phía trước
// Thành phần định tuyến Laravel cho phép tất cả các ký tự ngoại trừ /có mặt trong các giá trị tham số tuyến.
//  Bạn phải cho phép rõ ràng /là một phần của trình giữ chỗ của mình bằng cách sử dụng wherebiểu thức chính quy có điều kiện:
Route::get('/search/{search}', function ($search) {
    return $search;
})->where('search', '.*');
// Các tuyến đường được đặt tên
// Các tuyến đường được đặt tên cho phép tạo URL hoặc chuyển hướng thuận tiện cho các tuyến đường cụ thể. Bạn có thể chỉ định tên cho một tuyến bằng cách xâu chuỗi namephương thức vào định nghĩa tuyến:

Route::get('/user/profile', function () {
    //
})->name('profile');
// Bạn cũng có thể chỉ định tên tuyến cho các hành động của bộ điều khiển:

Route::get(
    '/user/profile',
    [UserProfileController::class, 'show']
)->name('profile');


// Tạo URL cho các tuyến đường được đặt tên
// Khi bạn đã chỉ định tên cho một tuyến nhất định, bạn có thể sử dụng tên của tuyến đó khi tạo URL hoặc chuyển hướng thông qua các chức năng của Laravel routevà redirecttrợ giúp:

// // Generating URLs...
// $url = route('profile');

// // Generating Redirects...
// return redirect()->route('profile');
// Nếu tuyến được đặt tên xác định các tham số, bạn có thể chuyển các tham số làm đối số thứ hai cho routehàm. Các tham số đã cho sẽ tự động được chèn vào URL được tạo ở các vị trí chính xác của chúng:

// Route::get('/user/{id}/profile', function ($id) {
//     //
// })->name('profile');

// $url = route('profile', ['id' => 1]);
// Nếu bạn chuyển các tham số bổ sung vào mảng, các cặp khóa / giá trị đó sẽ tự động được thêm vào chuỗi truy vấn của URL đã tạo:

// Route::get('/user/{id}/profile', function ($id) {
//     //
// })->name('profile');

// $url = route('profile', ['id' => 1, 'photos' => 'yes']);

// // /user/1/profile?photos=yes





route::get('learn_laravel',function(){
    return view('learn');
});
