<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\Sanpham;

class SanPhamController extends Controller
{
    //
    public $danhmuc;
    public $sanpham;
    public function __construct()
    {
        $this->danhmuc = new Danhmuc();
        $this->sanpham = new Sanpham();
    }
    public function xulythemsanpham(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'masanpham' => 'required|unique:sanpham',
                'num' => 'required',
                'desc' => 'required',
                'content' => 'required',
                'image' => 'required',
            ],
            [
                'required' => "không được bỏ trống :attribute",
                'unique' => ":attribute đã tồn tại"
            ],
            [
                'name' => 'tên sản phẩm',
                'price' => 'giá sản phẩm',
                'masanpham' => 'mã sản phẩm',
                'num' => 'số lượng sản phẩm',
                'desc' => 'mô tả sản phẩm',
                'content' => 'chi tiết sản phẩm',
                'image' => 'ảnh sản phẩm'
            ]
        );
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $NameImage = $file->getClientOriginalName();
            $file->move('admin/images', $file->getClientOriginalName());
        }
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['masanpham'] = $request->masanpham;
        $data['num'] = $request->num;
        $data['desc'] = $request->desc;
        $data['content'] = $request->content;
        $data['image'] = $NameImage;
        $data['danhmuc'] = $request->category;
        $data['trangthai'] = 1;
        if ($this->sanpham->themsanpham($data)) {
            return redirect(route('danhsachsanpham'));
        }
        return  redirect(route('themsanpham'));
    }
    public function themsanpham()
    {
        $danhmuc = $this->danhmuc->loaddanhmuc();
        return view("admin.themsanpham")->with("danhmuc", $danhmuc);;
    }
    public function danhsachsanpham()
    {
        $loadsanphamadmin = $this->sanpham->loadsanphamadmin();
        // return $loadsanphamadmin;
        return view('admin.danhsachsanpham')->with("loadsanphamadmin", $loadsanphamadmin);
    }

    public function capnhatsanpham($id)
    {
        $sanphambyid = $this->sanpham->LoadSanPhamById($id);
        $danhmuc = $this->danhmuc->loaddanhmuc();
        $trangthai = $this->sanpham->loadtrangthai();
        // return $sanphambyid;
        return view("admin.capnhatsanpham", ['sanphambyid' => $sanphambyid, 'danhmuc' => $danhmuc, 'trangthai' => $trangthai]);
    }

    public function xulycapnhatsanpham(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                // 'masanpham' => 'required|unique:sanpham',
                'num' => 'required',
                'desc' => 'required',
                'content' => 'required',

            ],
            [
                'required' => "không được bỏ trống :attribute",
                // 'unique' => ":attribute đã tồn tại"
            ],
            [
                'name' => 'tên sản phẩm',
                'price' => 'giá sản phẩm',
                // 'masanpham' => 'mã sản phẩm',
                'num' => 'số lượng sản phẩm',
                'desc' => 'mô tả sản phẩm',
                'content' => 'chi tiết sản phẩm',
                // 'image' => 'ảnh sản phẩm'
            ]
        );
        $data['id']=$request->id;
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['masanpham'] = $request->masanpham;
        $data['num'] = $request->num;
        $data['desc'] = $request->desc;
        $data['content'] = $request->content;
        $data['danhmuc'] = $request->category;
        $data['trangthai'] = $request->status;
        if ($this->sanpham->capnhatsanpham($data)) {
            return redirect(route('danhsachsanpham'));
        }
        return  redirect(route('themsanpham'));
    }
}
