<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sanpham extends Model
{
    protected $table = 'sanpham';
    protected $fillable = ['id', 'masanpham', 'tensanpham', 'soluong', 'dongia', 'hinhanh', 'motangan', 'chitietsanpham', 'soluongdaban', 'tinhtrang', 'id_danhmuc'];
    use HasFactory;
    public function LoadSanPhamTrangChu()
    {
        // $SanPhamTrangChu = DB::table('sanpham')->select('*')->where('tinhtrang', '=', 0)->get()->paginate(12);
        $SanPhamTrangChu = SanPham::where('tinhtrang', '=', 0)->simplePaginate(10);
        return $SanPhamTrangChu;
    }

    public function LoadSanPhamById($id)
    {
        $SanPham = SanPham::where('id', '=', $id)->get();
        return $SanPham;
    }
    public function themsanpham($data)
    {
        return   $sanpham = DB::table('sanpham')->insert(['masanpham' => $data['masanpham'], 'tensanpham' => $data['name'], 'soluong' => $data['num'], 'dongia' =>  $data['price'], 'hinhanh' => $data['image'], 'motangan' => $data['desc'], 'chitietsanpham' => $data['content'], 'tinhtrang' => 1, 'id_danhmuc' => $data['danhmuc']]);
    }
    public function loadsanphamadmin()
    {
        $SanPhamAdmin = DB::table('sanpham')->join('danhmuc', 'sanpham.id_danhmuc', '=', 'danhmuc.id_danhmuc')->select("*")->get();

        return $SanPhamAdmin;
    }
    public function loadtrangthai()
    {
        return  $trangthai = DB::table('trangthaisanpham')->select("*")->get();
    }
}
