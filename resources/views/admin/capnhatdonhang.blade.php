@extends('AdminLayout.layout')
@section('content')
<style>
    table tbody tr td {
        text-align: center;
    }

    table thead tr th {
        width: 12%;
        text-align: center;
    }

    table thead tr th:first-child {
        width: 5%;
    }

    table tbody tr td img {
        width: 70%;
        height: auto;
    }
</style>
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật đơn hàng đơn hàng
            </div>
            <div class="card-body">
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <!-- <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th> -->
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;
                        // $trangthai = "" 
                        ?>
                        @foreach($chitietdh as $item)

                        <tr class="">
                            <td>{{$count++}}</td>
                            <td><img src="{{asset('admin/images/'.$item->hinhanh)}}" alt=""></td>
                            <td>{{$item->masanpham}}</td>
                            <td><a href="#">{{$item->tensanpham}}</a></td>
                            <td><?php echo number_format($item->dongia) ?> vnd</td>
                            <td>{{$item->sl}}</td>
                            <td><?php echo number_format($item->sl * $item->dongia) ?> vnd</td>
                        </tr>


                        @endforeach


                    </tbody>
                </table>
                <form action="{{route('xulycapnhatdonhang')}}" method="POST">
                    @csrf
                    <input type="text" name="id" value="{{$dh[0]->id}}" hidden id="">
                    <label class="form-control" for="">Địa chỉ giao hàng</label>
                    <textarea name="address" id="" cols="20" class="form-control" rows="4">{{$dh[0]->diachigiaohang}}</textarea>
                    @error('address')
                    <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <label class="form-control" for="">Ghi chú</label>
                    <textarea name="notes" id="" cols="20" class="form-control" rows="4">{{$dh[0]->ghichu}}</textarea>
                    @error('notes')
                    <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <select name="trangthai" class="form-control" style="margin: 10px 0px;" id="">
                        @foreach($trangthaidonhang as $tt)
                        <option <?php
                                if ($tt->id_trangthai == $dh[0]->trangthai) {
                                    echo "selected='selected'";
                                }
                                ?> value="{{$tt->id_trangthai}}">{{$tt->ten_trangthai}}</option>
                        @endforeach
                    </select>
                    @if($dh[0]->trangthai == 0)
                    <button type="submit" name="update_order" class="btn btn-primary">Cập nhật đơn hàng</button>
                    @endif
                </form>

            </div>
        </div>
    </div>
</div>
@endsection