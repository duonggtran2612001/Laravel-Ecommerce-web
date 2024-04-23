@extends('UserLayout.layout')
@section('content')
<div id="wp-content">
    <div id="history-cart">
        <h2>Lịch sử đơn hàng</h2>
        <ul>

            @foreach($dsdh as $item)

            <li>
                <p class="tiem-order">Thời gian đặt hàng : <strong>{{$item->thoigiandathang}}</strong></p>
                <p>Mã đơn hàng: <strong>DH{{$item->id}}</strong></p>
                <table>
                    <thead>
                        <tr>
                            <td>Stt</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Đơn giá</td>
                            <td>Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        @foreach($item->sanpham as $val)
                        <tr>
                            <td>{{$count++}}
                            </td>
                            <td><img src="{{asset('admin/images/'.$val->hinhanh)}}" alt=""></td>
                            <td>{{$val->tensanpham}}</td>
                            <td>{{$val->sl}}</td>
                            <td><?php echo number_format($val->dongia) ?> vnd</td>
                            <td><?php echo number_format($val->sl * $val->dongia) ?> vnd</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="subtotal">
                    <h3>Tổng tiền:</h3>
                    <span><strong><?php echo number_format($item->tongtien) ?> vnd</strong> </span>
                </div>
                <div class="status">
                    <h3>Trạng thái :</h3>
                    <p><strong><?php if ($item->trangthai == 0) {
                                    echo "Đang xử lý";
                                } else {
                                    echo "Đã hoàn thành";
                                } ?></strong></p>
                </div>
                <div class="method">
                    <!-- <h3>Hủy đơn hàng</h3> -->


                    <!-- </form> -->
                </div>
            </li>

            @endforeach


        </ul>
    </div>
</div>
@endsection