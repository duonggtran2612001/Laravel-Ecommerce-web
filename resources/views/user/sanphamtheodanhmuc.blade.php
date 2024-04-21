@extends('UserLayout.layout')
@section('content')

<div class="content">
    <div class="product">

        <div id="list-product">
            <div style="padding: 30px; font-size: 24px;" id="danhmuc">Danh sách sản phẩm</div>
            <ul>
                @foreach($SanPhamTheoDanhMuc as $sanpham)
                <a href="{{ route('chitietsanpham', ['id' => $sanpham->id]) }}">
                    <li>
                        <div class="img"> <img src="{{ asset('admin/images/'.$sanpham->hinhanh) }}" alt="" /></div>
                        <div class="info">
                            <p class="name-product">{{ $sanpham->tensanpham }}</p>
                            <p class="price"><strong>{{ number_format($sanpham->dongia) }}.đ</strong></p>
                            <div class="rate">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                        </div>
                    </li>
                </a>
                @endforeach
            </ul>
            <style>
                .padding nav a, .padding nav span {
                    display: inline-block;
                    width: 150px;
                    margin: 10px;
                    text-decoration: none;
                    font-size: 24px;
                    background-color: red;
                    color: white;
                    text-align: center;
                    padding: 10px;
                }
            </style>
            <div class="padding" style="display: flex; justify-content:center">
                {{ $SanPhamTheoDanhMuc->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
