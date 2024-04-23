@extends('AdminLayout.layout')
@section('content')
<div id="wp-content">
    <div class="container-fluid py-5">
        <div class="card">
            <div class="card-header font-weight-bold">
                ĐƠN HÀNG MỚI
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Stt</th>
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Số điện thoại liên lạc</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        @foreach($dsdonhang as $item)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>DH{{$item->id}}</td>
                            <td>
                                {{$item->hovaten}}
                            </td>
                            <td>{{$item->lienlac}}</td>
                            <td><?php echo number_format($item->tongtien) ?> vnd</td>
                            <td>{{$item->soluongdonhang}}</td>
                            <td>{{$item->thoigiandathang}}</td>
                            <td><span class="badge badge-warning">{{$item->ten_trangthai}}</span></td>
                            <td> <a href="{{route('capnhatdonhang',['id'=>$item->id])}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
@endsection