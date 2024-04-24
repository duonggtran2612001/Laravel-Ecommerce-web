<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function danhsachkhachhang()
    {
        $dsuser = $this->user->get_user();
        // return $dsuser;
        return view('admin.danhsachkhachhang', ['dsuser' => $dsuser]);
    }
    public function capnhatkhachhang($id)
    {
        $user = $this->user->get_user_by_id($id);
        // return $user;
        return view('admin.capnhatkhachhang', ['user' => $user]);
    }

    public function xulycapnhatkhachhang(Request $request)
    {
        $request->validate(
            [

                'fullname' => 'required',
                'address' => 'required',

            ],
            [
                'required' => "không được bỏ trống :attribute",
            ],
            [
                'fullname' => 'họ và tên',
                'address' => 'địa chỉ',

            ]
        );
        $data['id'] = $request->id;
        $data['fullname'] = $request->fullname;
        $data['address'] = $request->address;
        $data['trangthai'] = $request->trangthai;
        return $this->user->update_user($data);
    }
}
