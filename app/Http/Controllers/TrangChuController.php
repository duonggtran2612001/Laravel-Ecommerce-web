<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use Illuminate\Support\Facades\Auth;

class TrangChuController extends Controller
{
    //
    public $sanpham;
    public function __construct()
    {
        $this->sanpham = new Sanpham();
    }
    public function trangchu()
    {

        
        $SanPhamTrangChu = $this->sanpham->LoadSanPhamTrangChu();
        return view("user.trangchu")->with("SanPhamTrangChu", $SanPhamTrangChu);
    }
    public function chitietsanpham($id)
    {
        $sanphambyid = $this->sanpham->LoadSanPhamById($id);
        return view("user.chitietsanpham")->with("sanphambyid", $sanphambyid);;
    }
}
