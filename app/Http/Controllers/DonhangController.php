<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonhangController extends Controller
{
    //
    public $donhang;
    public function __construct()
    {
        $this->donhang = new Order();
    }
    public function donhang()
    {
        $dsdonhang = $this->donhang->dsdonhang();
        return view('admin.trangchu', ['dsdonhang' => $dsdonhang]);
    }
    public function capnhatdonhang($id)
    {
        $trangthaidonhang = $this->donhang->trangthaidonhang();
        // return $trangthaidonhang;
        $dh  = $this->donhang->donhang($id);
        $chitietdh = $this->donhang->get_ctdonhang_byid($id);
        return view('admin.capnhatdonhang', ['chitietdh' => $chitietdh, 'dh' => $dh, 'trangthaidonhang' => $trangthaidonhang]);
    }
    public function xulycapnhatdonhang(Request $request)
    {
        $request->validate(
            [
                'address' => 'required',
                'notes' => 'required',
            ],
            [
                'required' => "không được bỏ trống :attribute",
            ],
            [
                'address' => 'địa chỉ giao hàng',
                'notes' => 'ghi chú',
            ]
        );
        $data['id'] = $request->id;
        $data['address'] = $request->address;
        $data['notes'] = $request->notes;
        $data['trangthai'] = $request->trangthai;
        return $this->donhang->update_order($data);
    }

    public function lichsudonhang()
    {
        $dsdh = $this->donhang->ds_donhang_user();
        // return $dsdh;
        foreach ($dsdh as &$dh) {
            $ctdh = $this->donhang->get_ctdonhang_byid($dh->id);
            $dh->sanpham = $ctdh;
        }
        return view('admin.lsdonhang', ['dsdh' => $dsdh]);
    }
}
