<?php

use App\Http\Controllers\DonhangController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
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

Route::get('/trangchu', [TrangChuController::class, 'trangchu'])->name('trangchu');
Route::get('/chitietsanpham/{id}', [TrangChuController::class, 'chitietsanpham'])->name('chitietsanpham');
Route::get('/AddToCart/{id}', [CartController::class, 'AddToCart'])->name('AddToCart');
Route::get('/dangnhap', [AuthController::class, 'dangnhap'])->name('dangnhap');

Route::post('/dangnhap', [AuthController::class, 'dangnhapPost'])->name('dangnhap.post');

Route::get('/dangky', [AuthController::class, 'dangky'])->name('dangky');

Route::post('/dangky', [AuthController::class, 'dangkyPost'])->name('dangky.post');

Route::get('/dangxuat', [AuthController::class, 'dangxuat'])->name('dangxuat');

Route::get('/giohang', [CartController::class, 'GioHang'])->name('giohang');;
Route::get('/xoaxamphamgiohang/{rowID}', [CartController::class, 'xoaxamphamgiohang'])->name('xoaxamphamgiohang');
Route::get('/xoagiohang', [CartController::class, 'xoagiohang'])->name('xoagiohang');
Route::get('/capnhatgiohang', [CartController::class, 'capnhatgiohang'])->name('capnhatgiohang');



Route::get('/thanhtoan', [PaymentController::class, 'thanhtoan'])->name('thanhtoan');
Route::post('/thanhtoan', [PaymentController::class, 'thanhtoanPost'])->name('thanhtoan.post');



Route::get('/admin/danhsachsanpham', [SanPhamController::class, 'danhsachsanpham'])->name('danhsachsanpham');

Route::get('/admin/themsanpham', function () {
    return view('admin/themsanpham');
});


Route::get('/admin/danhmucsanpham', [DanhMucController::class, 'loaddanhmuc'])->name('loaddanhmuc');

Route::get('/admin/capnhatdanhmucsanpham/{id}', [DanhMucController::class, 'capnhatdanhmucsanpham'])->name('capnhatdanhmucsanpham');
Route::get('/admin/xulycapnhatdanhmucsanpham', [DanhMucController::class, 'xulycapnhatdanhmucsanpham'])->name('xulycapnhatdanhmucsanpham');

Route::get('/admin/themsanpham', [SanPhamController::class, 'themsanpham'])->name('themsanpham');

Route::get('/admin/xulythemdanhmucsanpham', [DanhMucController::class, 'xulythemdanhmuc'])->name('xulythemdanhmucsanpham');

Route::get('/admin/themdanhmucsanpham', [DanhMucController::class, 'themdanhmucsanpham'])->name('themdanhmucsanpham');

Route::post('/admin/xulythemsanpham', [SanPhamController::class, 'xulythemsanpham'])->name('xulythemsanpham');
Route::post('/admin/xulycapnhatsanpham', [SanPhamController::class, 'xulycapnhatsanpham'])->name('xulycapnhatsanpham');


Route::get('/admin/capnhatsanpham/{id}', [SanPhamController::class, 'capnhatsanpham'])->name('capnhatsanpham');
Route::get('/admin/danhsachkhachhang', function () {
    return view('admin/danhsachkhachhang');
});

Route::get('/admin/thongtincanhan', function () {
    return view('admin/thongtincanhan');
});
Route::get('/admin/capnhatdonhang', function () {
    return view('/admin/capnhatdonhang');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('trangchu'));
})->name('logout');



// đơn hàng
Route::get('/admin/donhang', [DonhangController::class, 'donhang'])->name('donhang');
Route::get('/admin/capnhatdonhang/{id}', [DonhangController::class, 'capnhatdonhang'])->name('capnhatdonhang');
Route::post('/admin/xulycapnhatdonhang', [DonhangController::class, 'xulycapnhatdonhang'])->name('xulycapnhatdonhang');
Route::get('/admin/lichsudonhang', [DonhangController::class, 'lichsudonhang'])->name('lichsudonhang');
