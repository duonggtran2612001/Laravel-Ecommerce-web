<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use Illuminate\Support\Facades\DB;


class DanhMucController extends Controller
{
    public $danhmuc;
    public function __construct()
    {
        $this->danhmuc = new Danhmuc();
    }
    public function loaddanhmuc()
    {
        $dsdanhmuc = $this->danhmuc->loaddanhmuc();
        return view("admin.danhmuc")->with("tendanhmuc", $dsdanhmuc);
    }

    public function xulythemdanhmuc(Request $request)
    {
        $request->validate(
            ['name_category' => 'required'],
            ['required' => 'Không được bỏ trống :attribute'],
            ['name_category' => 'tên danh mục']
        );
        $ten_danhmuc = $request->name_category;
        return $this->danhmuc->themdanhmuc($ten_danhmuc);
    }
    public function themdanhmucsanpham(){
        return view("admin.themdanhmuc");
    }
    public function capnhatdanhmucsanpham($id){
        $danhmuc=$this->danhmuc->getdanhmuc($id);
        return view("admin.capnhatdanhmuc")->with("tendanhmuc", $danhmuc);
    }
    public function xulycapnhatdanhmucsanpham( Request $request){
        $request->validate(
            ['name_category' => 'required'],
            ['required' => 'Không được bỏ trống :attribute'],
            ['name_category' => 'tên danh mục']
        );
        $ten_danhmuc = $request->name_category;
        $id_danhmuc = $request->id_category;
        return $this->danhmuc->capnhatdanhmuc($ten_danhmuc,$id_danhmuc);
    }
}
