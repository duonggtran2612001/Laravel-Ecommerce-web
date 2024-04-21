<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;

class SanPhamController extends Controller
{
    public function LoadSanPhamTrangChu()
    {
        $sanphamModel = new Sanpham();
        $SanPhamTrangChu = $sanphamModel->LoadSanPhamTrangChu();;
        return view('user.trangchu')->with('SanPhamTrangChu', $SanPhamTrangChu);
    }

    public function LoadSanPhamTheoDanhMuc($id)
    {
        $sanphamModel = new Sanpham();
        $SanPhamTheoDanhMuc = $sanphamModel->LoadSanPhamByIdTheLoai($id)->paginate(10);
        
        return view('user.sanphamtheodanhmuc')->with('SanPhamTheoDanhMuc', $SanPhamTheoDanhMuc);
    }

    public function LoadSanPhamById($id)
    {
        $sanphamModel = new Sanpham();
        $SanPham = $sanphamModel->LoadSanPhamById($id);
        return view('user.sanphamtheodanhmuc')->with('SanPham', $SanPham);
    }
}
