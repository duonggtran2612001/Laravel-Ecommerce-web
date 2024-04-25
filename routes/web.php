<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TrangChuController;
use App\Models\trangthaisanpham;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trangchu',[TrangChuController::class,'trangchu'] )->name('trangchu');
Route::get('/chitietsanpham/{id}',[TrangChuController::class,'chitietsanpham'] )->name('chitietsanpham');
Route::get('/dangnhap',[AuthController::class,'dangnhap'])->name('dangnhap');

Route::post('/dangnhap',[AuthController::class,'dangnhapPost'])->name('dangnhap.post');

Route::get('/dangky',[AuthController::class,'dangky'])->name('dangky');

Route::post('/dangky',[AuthController::class,'dangkyPost'])->name('dangky.post');

Route::get('/dangxuat',[AuthController::class,'dangxuat'])->name('dangxuat');

Route::get('/giohang', function () {
    return view('user.giohang');
});

Route::get('/thanhtoan', function () {
    return view('user.thanhtoan');
});

Route::get('/admin/trangchu', function () {
    
    return view('admin.trangchu');
});

Route::get('/admin/danhsachsanpham', function () {
    return view('admin/danhsachsanpham');
});

Route::get('/admin/themsanpham', function () {
    return view('admin/themsanpham');
});

Route::get('/admin/danhmucsanpham',[DanhMucController::class, 'loaddanhmuc'])->name('loaddanhmuc');
Route::get('/admin/capnhatdanhmucsanpham/{id}',[DanhMucController::class, 'capnhatdanhmucsanpham'])->name('capnhatdanhmucsanpham');
Route::get('/admin/xulycapnhatdanhmucsanpham',[DanhMucController::class, 'xulycapnhatdanhmucsanpham'])->name('xulycapnhatdanhmucsanpham');

Route::get('/admin/themdanhmuc', function () {
    return view('admin/themdanhmuc');
});
Route::get('/admin/xulythemdanhmucsanpham', [DanhMucController::class, 'themdanhmuc'])->name('xulythemdanhmucsanpham');
Route::get('/admin/danhsachkhachhang', function () {
    return view('admin/danhsachkhachhang');
});

Route::get('/admin/thongtincanhan', function () {
    return view('admin/thongtincanhan');
});
Route::get('/admin/capnhatdonhang', function () {
    return view('/admin/capnhatdonhang');
});

