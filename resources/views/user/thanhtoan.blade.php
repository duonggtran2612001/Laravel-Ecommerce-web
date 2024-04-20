@extends('UserLayout.layout')
@section('content')

<div id="wp-content">
<form action="" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="checkout">

            <div class="info-customer">
                <h2>Thông tin khách hàng</h2>

                <label for="">Họ và tên</label>
                <input type="text" name="fullname" value="{{ $user->fullname }}" placeholder="Họ và tên" id="">
             	@error('username')
                	<div class="alert alert-danger">{{$message}}</div>
		@enderror

                <label for="">Email</label>
                <input type="text" name="email" readonly="readonly" value="{{ $user->email }}" placeholder="Email" id="">
		@error('email')
                	<div class="alert alert-danger">{{$message}}</div>
		@enderror

                <label for="">Số điện thoại liên lạc</label>
                <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Số điện thoại" id="">
		@error('phone')
                	<div class="alert alert-danger">{{$message}}</div>
		@enderror

                <label for="">Địa chỉ giao hàng</label>
                <textarea name="address" placeholder="Địa chỉ giao hàng" id="" cols="30" rows="10"></textarea>
		@error('address')
                	<div class="alert alert-danger">{{$message}}</div>
		@enderror

                <label for="">Ghi chú</label>
                <textarea name="notes" placeholder="Ghi chú" id="" cols="30" rows="10"></textarea>
		@error('notes')
                	<div class="alert alert-danger">{{$message}}</div>
		@enderror
            </div>
            <div class="info-cart">
                
                    <h2>Thông tin đơn hàng</h2>
                    <table>
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($cartItems as $item)
                                <tr>
                                    <td>{{ $item->name }} <strong>x <span> {{ $item->quantity }} </span></strong></td>
                                    <td><strong>{{ Cart::subtotal() }}</strong> </td>
                                </tr>
			   @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Tổng đơn hàng:</td>
                                <td><strong>{{ Cart::total() }}</strong></td>
                            </tr>
                        </tfoot>

                    </table>
                    <p>Hình thức thanh toán</p>
                    <select name="method" id="" style="padding: 10px;">
                        <option  value="">--Hình thức thanh toán--</option>
                        <option value="0">Thanh Toán Khi nhận hàng</option>
                        <option value="1">Thanh toán qua thẻ</option>
                    </select>
		    @error('method')
                	<div class="alert alert-danger">{{$message}}</div>
		    @enderror

                    <input type="submit" name="btn-checkout" id="" value="Đặt hàng">

                
             
            </div>

        </div>
    </form>
	@if($errors->has('error'))
		<div class="err_usernamelogin">{{ $errors->first('error') }}</div>
        @endif
</div>

@endsection