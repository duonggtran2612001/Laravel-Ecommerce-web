<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href=""> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/reset.css')}}">
    <script src="plugins/ckeditor/ckeditor.js"></script>
    <script src="{{asset('admin/js/main.js')}}"></script>
    <script src="{{asset('admin/js/app.js')}}"></script>


    <title>Admintrator</title>
</head>

<body>
    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="?">Gia Khay Store</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">


                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Quang Đạo
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <a class="dropdown-item" href="?mod=index&action=logout">Thoát</a>
                    </div>
                </div>
            </div>
        </nav>
        <div id="sidebar" class="bg-white">
            <ul id="sidebar-menu">
                <li class="nav-link">
                    <a href="{{route('donhang')}}">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Dashboard
                    </a>
                    <i class="arrow fas fa-angle-right"></i>
                </li>

                <li class="nav-link active">
                    <a href="danhsachsanpham">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Sản phẩm
                    </a>
                    <i class="arrow fas fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li><a href="themsanpham">Thêm mới</a></li>
                        <li><a href="{{route('loaddanhmuc')}}">Danh mục</a></li>
                        <li><a href="{{route('themdanhmucsanpham')}}">Thêm danh mục sản phẩm</a></li>

                    </ul>
                </li>

                <li class="nav-link">
                    <a href="danhsachkhachhang">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Quản lý khách hàng
                    </a>
                    <i class="arrow fas fa-angle-right"></i>

                    <ul class="sub-menu">
                        <!-- <li><a href="?mod=member&controller=index&action=addmember">Thêm mới</a></li> -->
                        <!-- <li><a href="?mod=member&controll">Danh sách</a></li> -->
                    </ul>
                </li>

                <li class="nav-link">
                    <a href="thongtincanhan">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Thông tin cá nhân
                    </a>
                    <i class="arrow fas fa-angle-right"></i>

                    <!-- <ul class="sub-menu">
                        <li><a href="?mod=yourinfo&controller=index&action=resetpass">Đổi mật khẩu</a></li>
                    </ul> -->
                </li>




            </ul>
        </div>
        @yield('content')


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('admin/js/app.js')}}"></script>
    <script src="{{asset('admin/js/xuly.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>