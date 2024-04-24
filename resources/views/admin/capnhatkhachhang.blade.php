@extends('AdminLayout.layout')
@section('content')
<style>

</style>

<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật thông tin
            </div>
            <div class="card-body">
                <form action="{{route('xulycapnhatkhachhang')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input class="form-control" value="{{$user[0]->idd}}" type="text" name="id" id="name" hidden>

                        <div class="col-8">
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input class="form-control" value="{{$user[0]->fullname}}" type="text" name="fullname" id="name">
                            </div>
                            @error('fullname')
                            <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="price">Tên đăng nhập</label>
                                <input class="form-control" type="text" value="{{$user[0]->name}}" name="username" id="name" readonly>
                            </div>

                            <div class="form-group">
                                <label for="code">Email</label>
                                <input class="form-control" type="text" value="{{$user[0]->email}}" name="email" id="name" readonly>
                            </div>


                        </div>

                        <div class="col-8">
                            <div class="form-group">
                                <label for="intro">Địa chỉ</label>
                                <textarea name="address" class="ckeditor form-control" id="intro" cols="30" rows="12">{{$user[0]->address}}</textarea>
                            </div>
                            @error('address')
                            <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="trangthai" id="">

                                    <option value="0" <?php if ($user[0]->trangthai == 0) {
                                                            echo "selected='selected'";
                                                        } ?>>Hoạt động</option>
                                    <option value="1" <?php if ($user[0]->trangthai == 1) {
                                                            echo "selected='selected'";
                                                        } ?>>Khóa</option>
                                    <option value="2" <?php if ($user[0]->trangthai == 2) {
                                                            echo "selected='selected'";
                                                        } ?>>Xóa</option>

                                </select>
                            </div>
                        </div>




                    </div>








                    <input type="submit" name="btn-add-product" class="btn btn-primary" value="Cập nhật thông tin">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection