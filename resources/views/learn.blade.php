
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p.message{
            width:800px;
        }
        p.de{
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>
<body>
        <pre>

       <p class='de'>Kiểm tra tuyến đường hiện tại</p>
        Nếu bạn muốn xác định xem yêu cầu hiện tại có được định tuyến đến một tuyến đường được đặt tên nhất định hay không,
        bạn có thể sử dụng namedphương pháp trên một cá thể Tuyến đường. Ví dụ: bạn có thể kiểm tra tên tuyến đường hiện tại từ phần mềm trung gian của tuyến đường:

        /**
        * Handle an incoming request.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \Closure  $next
        * @return mixed
        */
        public function handle($request, Closure $next)
        {
            if ($request->route()->named('profile')) {
                //
            }

            return $next($request);
        }
        <br>
        Nhóm tuyến đường
Các nhóm tuyến đường cho phép bạn chia sẻ các thuộc tính tuyến đường, chẳng hạn như phần mềm trung gian,
trên một số lượng lớn các tuyến đường mà không cần xác định các thuộc tính đó trên từng tuyến đường riêng lẻ.

Các nhóm lồng nhau cố gắng "hợp nhất" các thuộc tính với nhóm mẹ một cách thông minh.
 Phần mềm trung gian và wheređiều kiện được hợp nhất trong khi tên và tiền tố được thêm vào.
 Dấu phân cách không gian tên và dấu gạch chéo trong tiền tố URI được tự động thêm vào khi thích hợp.
 Phần mềm trung gian
Để gán phần mềm trung gian cho tất cả các tuyến trong một nhóm, bạn có thể sử dụng middlewarephương pháp này trước khi xác định nhóm. Phần mềm trung gian được thực thi theo thứ tự chúng được liệt kê trong mảng:

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });

    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});

Định tuyến miền phụ
Nhóm định tuyến cũng có thể được sử dụng để xử lý định tuyến miền phụ. Miền phụ có thể được chỉ định các tham số tuyến giống như URI tuyến, cho phép bạn nắm bắt một phần của miền phụ để sử dụng trong tuyến hoặc bộ điều khiển của mình. Miền phụ có thể được chỉ định bằng cách gọi domainphương thức trước khi xác định nhóm:

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

Tiền tố tuyến đường
Phương prefixthức này có thể được sử dụng để đặt trước mỗi tuyến đường trong nhóm với một URI nhất định. Ví dụ: bạn có thể muốn đặt tiền tố cho tất cả các URI định tuyến trong nhóm bằng admin:

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});
</pre>
</body>
</html>
