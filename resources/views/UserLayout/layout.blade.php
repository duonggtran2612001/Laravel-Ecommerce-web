<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self';"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css" />
    <link rel="stylesheet" href="{{asset('css/header.css')}}" />
    <link rel="stylesheet" href="{{asset('css/wp-content.css')}}" />
    <link rel="stylesheet" href="{{asset('css/footer.css')}}" />
    <link rel="stylesheet" href="{{asset('css/login-reg.css')}}" />
    <link rel="stylesheet" href="{{asset('css/detailproduct.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('css/checkout.css')}}">
    <link rel="stylesheet" href="{{asset('css/history_cart.css')}}">
    <link rel="stylesheet" href="{{asset('css/yourinfo.css')}}">
    <link rel="stylesheet" href="{{asset('css/pagging.css')}}">
    <link rel="stylesheet" href="{{asset('css/product_conditions.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->


    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">

    <!-- <link rel="stylesheet" href="js/main.js"> -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/main.js"></script>
    <script src="js/ajax.js"></script>


    <!-- <script src="jquery.min.js"></script> -->
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <title>Document</title>
</head>
<!-- <script>
    function processURL() {
        // Lấy URL từ trình duyệt
        const currentURL = window.location.href;

        // Gọi hàm kiểm tra
        checkURL(currentURL);
    }

    function checkURL(url) {
        // Thực hiện kiểm tra URL, ví dụ: mã hóa URL
        const encodedURL = encodeURIComponent(url);
        console.log(encodedURL);
    }

    // Gọi hàm processURL khi trang web được tải
    window.onload = processURL;
</script> -->


<style>
    #alert {
        position: fixed;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        display: none;
        background: rgba(0, 0, 0, 0.53);
    }

    #alert .alert {
        width: 30%;
        padding: 20px;
        background-color: white;
        margin: 0px auto;
        margin-top: 10%;
        z-index: 1000;
    }

    .show {
        display: block !important;
    }

    #alert .alert a {
        display: inline-block;
        text-decoration: none;
        padding: 10px;
        width: 20%;
        margin-top: 20px;
        background-color: blue;
        color: white;

        border: none;
    }

    #alert .alert #ok {
        margin-right: 50%;
    }

    #alert .alert a:hover {
        background-color: red;
        cursor: pointer;
    }
</style>



<body>
    <div id="wrapper">
        <div id="header">
            <div class="head-top">
                <div class="information">
                    <div class="address">
                        <p>
                            <i class="fas fa-map-marker-alt"></i> 143-An Dương Vương Quận 5 Tp HCM
                        </p>
                    </div>
                    <div class="phone">
                        <p><i class="fas fa-phone-alt"></i> 0961256443</p>
                    </div>
                </div>
            </div>
            <div class="head-content">
                <div class="content">
                    <div class="icon" id="load_menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="logo">
                        <a href="{{route('trangchu')}}">Vsmart</a>
                    </div>
                    <!-- <form action="" forget></form> -->
                    <div class="search">
                        <form action="http://localhost/Cuahangdienthoai/website/?mod=home&action=home" method="GET">
                            <input type="text" name="q" id="search" value="" placeholder="Tìm kiếm ......" />
                            <input type="submit" name="btn-search" value="Tìm kiếm">
                            <div id="list_search"></div>
                        </form>
                    </div>


                    <div class="gointo">
                        <div class="user">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="form">
                            <span>Đăng nhập /</span><span> Đăng ký</span>
                            <br />
                            <input type="submit" value="Tài khoản"> <i class="fa-solid fa-caret-down"></i>
                            <div class="choose-form">
                                <a href="dangnhap">Đăng nhập</a>
                                <a href="dangky">Đăng ký</a>
                            </div>
                        </div>
                    </div>

                    <div class="cart">
                        <span></span>
                        <div class="icon-cart">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                        </div>
                        <div class="list-cart">



                            <p>Có <strong class="num-order">{{Cart::count()}}</strong> sản phẩm trong giỏ hàng </p>
                            <ul>
                                @foreach (Cart::content() as $row)
                                <li>
                                    <div class="item">
                                        <div class="img-product">
                                            <a href="{{route('chitietsanpham',['id'=>$row->id])}}" alt=""><img src="{{asset('admin/images/'.$row->options->hinhanh)}}" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <p class="name"></p>
                                            <p class="price"><?php echo number_format($row->price) ?> VNĐ</p>
                                            <p class="num-order">Số lượng:{{$row->qty}}</p>
                                        </div>
                                    </div>
                                </li>

                                @endforeach

                            </ul>
                            <p class="total">Tổng tiền:<strong class="sub-total">{{Cart::total()}} VNĐ</strong></p>

                            <a href="{{route('giohang')}}" class="cart">Giỏ hàng</a>
                            <a href="thanhtoan" class="checkout">Thanh toán</a>
                        </div>
                    </div>


                </div>


            </div>

            
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mx-auto"> 
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0"> 
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 13]) }}">Máy Tính</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 14]) }}">Điện Thoại</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 15]) }}">Sam Sung</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 16]) }}">LapTop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 17]) }}">Iphone</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 18]) }}">Oppo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 19]) }}">Máy Tính Bảng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 20]) }}">Phụ kiện điện thoại</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 21]) }}">Tai Nghe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 22]) }}">Acer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 23]) }}">AirPort</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 24]) }}">LapTop Gaming</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 25]) }}">Dell</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 26]) }}">Thiết bị mạng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 27]) }}">Cáp Sạc</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 28]) }}">Phụ Kiện Gaming</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 29]) }}">Ốp Lưng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 30]) }}">Loa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sanphamtheodanhmuc', ['id' => 31]) }}">Sạc Dự Phòng</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            
            <div id="menu_replace">

                <div class="menu">
                    <div class="hide" id="hide">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                    </div>
                    <ul>


                    </ul>
                </div>
            </div>

        </div>
        <div id="wp-content">
            @yield('content')
        </div>
        <div id="footer">
            <div class="wrapper">
                <div class="intro">
                    <p class="title">Vsmart</p>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries,
                    </p>
                </div>
                <div class="info">
                    <h3>
                        Địa chỉ liên lạc
                    </h3>
                    <ul>
                        <li>
                            <p><i class="fa-solid fa-location-dot"></i> Đại học sài gòn</p>
                        </li>
                        <li>
                            <p>
                                <i class="fas fa-phone-alt"></i> 0987.654.321 - 0989.989.989
                            </p>
                        </li>
                        <li>
                            <p><i class="fa-solid fa-envelope"></i> vshop@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="rules">
                    <h3>Chính sách cửa hàng</h3>
                    <ul>
                        <li>
                            <p>Quy định - chính sách</p>
                        </li>
                        <li>
                            <p>Chính sách bảo hành - đổi trả</p>
                        </li>
                        <li>
                            <p>Chính sách hội viện</p>
                        </li>
                        <li>
                            <p>Giao hàng - lắp đặt</p>
                        </li>
                    </ul>
                </div>
                <div class="news">
                    <h3 class="title">Bảng tin</h3>
                    <p>Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                </div>
            </div>
        </div>
        <div id="copyright">
            <p>Bản quyền thuộc về @Trần Quang Đạo khoa công nghệ thông tin Đại học Sài Gòn</p>
        </div>
    </div>

</body>

</html>
