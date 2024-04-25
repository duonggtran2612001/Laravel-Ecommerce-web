@extends('AdminLayout.layout')
@section('content')
<div id="wp-content">
    <div id="content" class="container-fluid">
        <div class="row">

            <div class="col-7">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh sách danh mục sản phẩm
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="card-body">
                        <table class="table table-striped table-checkall">
                            <thead>
                                <tr>

                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tendanhmuc as $value)
                                <tr class="">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->ten_danhmuc}}</td>
                                    <td>
                                        <a href="{{route('capnhatdanhmucsanpham',['id'=>$value->id_danhmuc])}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <style>
                            #addCate {
                                display: none;
                            }
                        </style>
                    
                    </div>

                </div>

            </div>

        </div>
        <form>

        </form>
    </div>
    @endsection