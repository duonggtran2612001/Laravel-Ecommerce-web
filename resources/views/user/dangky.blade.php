@extends('UserLayout.layout')
@section('content')

<style>
    #form-reg .form-reg form .username p,
    #form-reg .form-reg form .fullname p,
    #form-reg .form-reg form .email p,
    #form-reg .form-reg form .password p,
    #form-reg .form-reg form .re_password p,
    #form-reg .form-reg form .addresss p {
        width: 656px;
        margin: 10px auto;
        color: red;
    }
</style>
<div id="wp-content">

    <div id="form-reg">
        <div class="form-reg">
            <h2>Đăng ký thành viên</h2>
            <form action="{{route('dangky.post')}}" method="POST">
		@csrf
                <label for="">Tên tài khoản</label>
                <input type="text" name="username" id="username" placeholder="Tên đăng nhập">
		@error('username')
                	<div style="width:50%;margin:0px auto" class="alert alert-danger">{{$message}}</div>
		@enderror

                <label for="">Họ và tên</label>
                <input type="text" name="fullname" id="fullname" placeholder="Họ và tên">
                @error('fullname')
			<div style="width:50%;margin:0px auto" class="alert alert-danger">{{$message}}</div>
		@enderror
                <label for="">Email</label>
                <input type="text" name="email" id="email" placeholder="Email">
		@error('email')
                	<div style="width:50%;margin:0px auto" class="alert alert-danger">{{$message}}</div>
		@enderror

                <label for="">Mật khẩu</label>
                <input type="password" name="password" id="password" placeholder="Mật khẩu">
		@error('password')
                	<div style="width:50%;margin:0px auto" class="alert alert-danger">{{$message}}</div>
		@enderror

                <label for="">Nhập lại mật khẩu</label>
                <input type="password" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu">
		@error('re_password')
                	<div style="width:50%;margin:0px auto" class="alert alert-danger">{{$message}}</div>
		@enderror

                <label for="">Địa chỉ liên lạc</label>
                <textarea name="address" id="address" cols="30" rows="10" placeholder="Địa chỉ liên lạc"></textarea>
		@error('address')
                	<div style="width:50%;margin:0px auto" class="alert alert-danger">{{$message}}</div>
		@enderror
                <input type="submit" id="inputsubmit" name="btn-reg" value="Đăng ký">
            </form>
	    @if($errors->has('error'))
		<div class="alert alert-danger">{{ $errors->first('error') }}</div>
            @endif
        </div>
    </div>
</div>


@endsection