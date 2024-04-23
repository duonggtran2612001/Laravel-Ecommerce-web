<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sanpham extends Model
{
    protected $table = 'sanpham';
    protected $fillable = ['id', 'masanpham', 'tensanpham', 'soluong', 'dongia', 'hinhanh', 'motangan', 'chitietsanoham', 'soluongdaban', 'tinhtrang', 'id_danhmuc'];
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
    
        public function LoadSanPhamByIdTheLoai($id)
    {
        
        return Sanpham::where('id_theloai', '=', $id);
        
    }
}
}
