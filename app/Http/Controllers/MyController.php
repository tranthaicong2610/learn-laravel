<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    public function ham_request(Request $request)
    {
        echo $request->path()."<br/>";
        echo $request->url()."<br/>";
        //kiem tra phuong thuc
        if($request->isMethod('get'))
        {
            echo "phuong thuc get <br/>";
        }
        else echo "khong phai phuong thuc get <br/>";

        // kiem tra duong dan co chua chu can tim khong
        if($request->is('goi*')) echo "co chua chu can tim <br/>";
        else "khong chua chu can tim trong duong dan ";
    }
    public function xuly(Request $request)
    {
        if($request->username=="tran thai cong"&&$request->password=="123456")
        echo "ban dang nhap thanh cong<br/>";
        else echo "ban dang nhap that bai<br/> ";

        // tim xem co tham so hien huu hay khong
        if($request->has('name')) echo "co <br/>";
        else echo "khong <br/>";
        if($request->has('username')) echo "ban da nhap username<br/>";
        else echo "ban chua nhap username<br/>";

   }
   public function setCookie()
   {
       $response=new Response();
       $response->withCookie('khoahoc','lap trinh laravel',1);
       return $response;
   }
   public function getCookie(Request $request)
   {
       return $request->cookie('khoahoc');
   }
}
