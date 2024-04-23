<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = "donhang";
    protected $fillable = [
        'username',
        'hovaten',
        'thoigiandathang',
        'tongtien',
        'soluongdonhang',
        'diachigiaohang',
        'lienlac',
        'trangthai',
        'ghichu',

    ];
    public $timestamps = false;

    public function saveOrder($data)
    {
        $order = new self();
        $order->username = $data['username'];
        $order->hovaten = $data['fullname'];
        $order->thoigiandathang = $data['time'];
        $order->tongtien = $data['total'];
        $order->soluongdonhang = $data['amount'];
        $order->diachigiaohang = $data['address'];
        $order->lienlac = $data['phone'];
        $order->ghichu = $data['note'];
        $order->trangthai = $data['method'];
        // $order->nguoihoanthanh=
        //$order->completed_by=$data['completed_by'];

        return $order->save();
    }
    public function get_id_orer()
    {
        return $maxId = DB::table('donhang')->max('id');
    }
    public function save_detail_order($data)
    {
        DB::table('chitietdonhang')->insert([
            'id_donhang' => $data['iddh'],
            'id_sanpham' => $data['idsp'],
            'soluong' => $data['soluong'],
            'dongia' => $data['dongia'],
        ]);
    }

    public function dsdonhang()
    {
        return $dsdonhang = DB::table('donhang')->join('trangthaidonhang', 'trangthaidonhang.id_trangthai', '=', 'donhang.trangthai')->select("*")->get();
    }
    public function donhang($id)
    {
        return $donhang = DB::table('donhang')->join('trangthaidonhang', 'trangthaidonhang.id_trangthai', '=', 'donhang.trangthai')->where('donhang.id', '=', $id)->select("*")->get();
    }

    public function trangthaidonhang()
    {
        return $donhang = DB::table('trangthaidonhang')->select("*")->get();
    }
    public function get_ctdonhang_byid($id)
    {
        return $chitietdh = DB::table('chitietdonhang')->join('sanpham', 'chitietdonhang.id_sanpham', '=', 'sanpham.id')->where('chitietdonhang.id_donhang', '=', $id)->select("*", 'chitietdonhang.soluong as sl')->get();
    }

    public function update_order($data)
    {
        $db = DB::table('donhang')->where('id', '=', $data['id'])->update(['diachigiaohang' => $data['address'], 'ghichu' => $data['notes'], 'trangthai' => $data['trangthai']]);
        if ($db) {
            return redirect()->route('donhang')->with('success', 'Đã cập nhật  thành công');
        }
        return redirect()->route('capnhatdonhang', ['id' => $data['id']])->with('error', 'thêm thất bại');
    }
    public function ds_donhang_user()
    {
        return $dsdh = DB::table('donhang')->where('username', '=', Auth::user()->name)->select("*")->get();
    }
}
