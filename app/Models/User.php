<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'fullname',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function authenticate($username, $password)
    {
        $user = self::where('name', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }
    public function register($data)
    {
        $user = new self();

        $user->name = $data['name'];
        $user->password = $data['password'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->fullname = $data['fullname'];
        return $user->save();
    }

    public function get_user()
    {
        return $dsuser = DB::table('users')->join('trangthainguoidung', 'trangthainguoidung.id', '=', 'users.trangthai')->select("*", 'users.id as idd')->get();
    }

    public function get_user_by_id($id)
    {
        return $user = DB::table('users')->join('trangthainguoidung', 'trangthainguoidung.id', '=', 'users.trangthai')->where('users.id', '=', $id)->select("*", 'users.id as idd')->get();
    }

    public function update_user($data)
    {
        $db = DB::table('users')->where('id', $data['id'])->update(['fullname' => $data['fullname'], 'address' => $data['address'], 'trangthai' => $data['trangthai'],]);
        if ($db) {
            return redirect()->route('danhsachkhachhang')->with('success', 'Đã cập nhật danh mục thành công');
        }
        return redirect()->route('capnhatkhachhang', ['id' => $data['id']])->with('error', 'thêm thất bại');
    }
}
