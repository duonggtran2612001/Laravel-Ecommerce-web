@extends("AdminLayout.layout")
@section('content')
<style>
    .card .card-body table thead tr th {
        width: 6%;
    }

    .card .card-body table thead tr th:nth-child(1) {
        width: 3%;
    }

    .card .card-body table thead tr th:nth-child(4) {
        width: 18%;
    }

    .card .card-body table tbody tr td img {
        width: 100%;
        height: auto;
    }

    #content .card .card-body .list_choose a {
        display: inline-block;
        margin-right: 10px;
        padding: 10px;
        color: black;
        background-color: #ddd;
        margin-bottom: 20px;
        font-weight: bold;
        text-decoration: none;
    }

    .card .card-body .pagging {
        margin: 0px auto;
        justify-content: center;
    }
</style>


<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách sản phẩm</h5>
                <div class="form-search form-inline">
                    <form action="" style="display: flex;" method="GET">
                        <input type="text" name="q" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
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
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Người tạo</th>
                            <th scope="col">Trạng thái</th>

                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        @foreach($loadsanphamadmin as $sanpham)

                        <tr class="">
                            <td>{{$count++}}</td>
                            <td><img src="{{asset('admin/images/'.$sanpham->hinhanh)}}" alt=""></td>
                            <td>{{$sanpham->masanpham}}</td>
                            <td><a href="#">{{$sanpham->tensanpham}}</a></td>
                            <td><?php echo number_format($sanpham->dongia) ?> vnd</td>
                            <td>{{$sanpham->soluong}}</td>
                            <td>{{$sanpham->ten_danhmuc}}</td>
                            <td>{{$sanpham->ngayphathanh}}</td>
                            <td>{{$sanpham->nguoithem}}</td>
                            <td><span>{{$sanpham->tinhtrang}}</span></td>
                            <td>

                                <a href="{{route("capnhatsanpham",['id'=>$sanpham->id])}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>

                                <!-- <a href="" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a> -->


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