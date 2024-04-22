<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
	public function dangnhap()
	{
		return view('user.dangnhap');
	}

	public function dangnhapPost(Request $request)
	{
		$request->validate([
			'username' => 'required',
			'password' => 'required'
		]);
		$user = (new User())->authenticate($request->username, $request->password);
		if ($user) {
			Auth::login($user);
			return redirect()->intended(route('trangchu'));
		} else {
			return redirect()->route('dangnhap')->withInput()->withErrors(['error' => 'Username or password not correct']);
		}
	}

	public function dangky()
	{
		return view('user.dangky');
	}

	public function dangkyPost(Request $request)
	{
		$request->validate([
			'username' => 'required',
			'fullname' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6',
			're_password' => 'required|same:password',
			'address' => 'required',
		]);

		$data['name'] = $request->username;
		$data['email'] = $request->email;
		$data['address'] = $request->address;
		$data['fullname'] = $request->fullname;
		$data['password'] = $request->password;
		$user = new User();
		$registered = $user->register($data);
		if (!$registered) {
			return redirect()->route('dangky')->withInput()->withErrors(['error' => 'Registration failed, please try again']);
		} else {
			return redirect(route('dangnhap'));
		}
	}
	public function dangxuat()
	{
		Session::flush();
		Auth::logout();
		return redirect(route('dangnhap'));
	}
}
