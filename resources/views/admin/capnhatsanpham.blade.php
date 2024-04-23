@extends('AdminLayout.layout')
@section('content')
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật sản phẩm
            </div>
            <div class="card-body">
                <form action="{{route('xulycapnhatsanpham')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <input class="form-control" value="{{$sanphambyid[0]->id}}" type="text" name="id" id="name" hidden>

                        <div class="col-8">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input class="form-control" value="{{$sanphambyid[0]->tensanpham}}" type="text" name="name" id="name">
                            </div>
                            @error('name')
                            <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input class="form-control" type="number" value="{{$sanphambyid[0]->dongia}}" name="price" id="name">
                            </div>
                            @error('price')
                            <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="code">Mã sản phẩm</label>
                                <input class="form-control" type="text" value="{{$sanphambyid[0]->masanpham}}" name="masanpham" id="name" readonly>
                            </div>
                            @error('masanpham')
                            <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="num">Số lượng</label>
                                <input class="form-control" type="number" value="{{$sanphambyid[0]->soluong}}" min="1" max="20" name="num" id="name">
                            </div>
                            @error('num')
                            <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-8">
                            <div class="form-group">
                                <label for="intro">Mô tả sản phẩm</label>
                                <textarea name="desc" class="ckeditor form-control" id="intro" cols="30" rows="12">{{$sanphambyid[0]->motangan}}</textarea>
                            </div>
                            @error('desc')
                            <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="intro">Chi tiết sản phẩm</label>
                                <textarea name="content" class="ckeditor form-control" id="intro" cols="30" rows="5">{{$sanphambyid[0]->chitietsanpham}}</textarea>
                            </div>
                            @error('content')
                            <div style="margin:0px auto" class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-8">
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select class="form-control" name="category" id="">
                                    @foreach($danhmuc as $val)
                                    <option <?php if ($sanphambyid[0]->id_danhmuc == $val->id_danhmuc) {
                                                echo "selected='selected'";
                                            } ?> value="{{$val->id_danhmuc}}">{{$val->ten_danhmuc}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select name="status" id="" class="form-control">
                                    @foreach($trangthai as $item)
                                    <option <?php if ($sanphambyid[0]->tinhtrang == $item->id_trangthainguoidung) {
                                                echo "selected='selected'";
                                            } ?> value="{{$item->id_trangthainguoidung}}">{{$item->tentrangthai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>








                    <input type="submit" name="btn-add-product" class="btn btn-primary" value="Cập nhật sản phẩm">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection