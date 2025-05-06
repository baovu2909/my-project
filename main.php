<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        a {
            color: white;
        }

        a:hover {
            text-decoration: none;
        }

        .navbar-brand:hover {
            color: #FFD700;
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: bold;
            padding: 10px 15px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            background-color: #004B7F;
            color: #FFD700;
            border-radius: 5px;
        }

        .slide {
            width: 100%;
            height: 100%;
            animation: fade 9s linear infinite;
        }

        @keyframes fade {
            0% {
                opacity: 0;
            }

            20% {
                opacity: 1;
            }

            80% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        #slide1 {
            animation-delay: 0s;
        }

        #slide2 {
            animation-delay: 0s;
            display: none;
        }

        #slide3 {
            animation-delay: 0s;
            display: none;
        }

        #slide4 {
            animation-delay: 0s;
            display: none;
        }

        .slider-container {
            width: 100%;
            height: auto;
            overflow: hidden;
            position: relative;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            z-index: 1000;
            border-radius: 50%;
        }

        .arrow-prev {
            left: 10px;
        }

        .arrow-next {
            right: 10px;
        }


        #backtop {
            width: 70px;
            height: 70px;
            background-color: blue;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            position: fixed;
            bottom: 150px;
            right: 20px;
            cursor: pointer;
            z-index: 2;
        }
    </style>

</head>

<div id='backtop'>
    <i class="fa-solid fa-chevron-up"></i>
</div>

<body>
    <header>
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-10" style="background: #0A314F; height: 50px;">
                <div style="color: white; font-weight: bold; padding: 15px 20px 0px 100px; float: left" bis_skin_checked="1">
                    Thành viên của
                </div>
                <a href="#">
                    <img src="img/logo-ttcedu" style="width: 50px;">
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2" style="background: #0A314F; height: 50px; border-left: 1px solid white;">
                <div class="cus-ttcedu" style="float: left; font-weight: bold; padding: 15px 15px; font-size: 12px;">
                    <div style="float: left;">
                        <a href="#">
                            <img src="img/youtobe.png" alt="youtube">
                        </a>
                    </div>
                    <div style="float: left;">
                        <a href="#">
                            <img src="img/facebook.png" alt="facebook">
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="img/banner-sona.png" style="width: 100%; max-height: 400px;">
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0A314F;">
            <div class="container-fluid">
                <a class="navbar-brand" href="https://portal.sonadezi.edu.vn/" style="font-weight: bold;">Trang Chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="danhgia.php">Đánh giá giáo viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Danh sách đánh giá</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="row">
        <div class="col-md-12">
            <div class="slider-container">
                <div class="slide" id="slide1"><a href="https://tuyensinh.sonadezi.edu.vn/"
                        target="_blank"><img src="img/pics01.jpg" class="img-fluid"
                            width="100%" height="auto" style="object-fit:cover;"></a>
                </div>
                <div class="slide" id="slide2"><a href="https://tuyensinh.sonadezi.edu.vn/"
                        target="_blank"><img src="img/tuyensinh.png" class="img-fluid"
                            style="object-fit:cover;" width="100%" height="auto"></a>
                </div>
                <div class="slide" id="slide3"><a href="https://tuyensinh.sonadezi.edu.vn/"
                        target="_blank"><img src="img/pics03.png" class="img-fluid"
                            width="100%" height="auto" style="object-fit:cover;"></a>
                </div>

                <a href="#" class="arrow arrow-prev">❮</a>
                <a href="#" class="arrow arrow-next">❯</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-8 col-sm-12 ">
                <div class="card">
                    <div class="card-body" style="background-color: #003768;">
                        <div class="card-title" >
                            <strong>Thông tin trang chủ</strong>
                        </div>
                    </div>
                    <div class="card-body">
                    Đây là hệ thống đánh giá giáo viên được xây dựng bởi sinh viên Vũ Quốc Bảo. Mục tiêu của hệ thống là cung cấp một nền tảng đơn giản, dễ sử dụng để sinh viên đưa ra phản hồi khách quan về chất lượng giảng dạy, góp phần nâng cao hiệu quả giáo dục.
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" style="background-color: #003768;"><strong>Tin Tức</strong></div>
                    <div class="card-body"><a href="https://tuyensinh.sonadezi.edu.vn/"><img src="img/tuyensinh.png" width="100%" ></a></div>
                    <div class="card-body"><a href="https://tuyensinh.sonadezi.edu.vn/"><img src="img/pic1.jpg" width="100%" ></a></div>
                    <div class="card-body"><a href="https://tuyensinhhuongnghiep.vn/truong-cao-dang-sonadezi-thong-bao-tuyen-sinh-cao-dang-chinh-quy-nam-2023.htm"><img src="img/tttuyensinh.jpg" width="100%" ></a></div>

                </div>
            </div>
            <br>
            <br>
            <div class="col-lg-8 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <br>
                            <h2 style="text-align: center;">HƯỚNG DẪN CÁCH ĐÁNH GIÁ GIÁO VIÊN TRÊN TRANG CHỦ</h2>
                            <br><br><br>
                            <h3><i class="fa-solid fa-arrow-right"></i> Bước 1: Click chọn Đánh giá giáo viên để đánh giá</h3>
                            <div class="card-subtitle">
                                <br><br><br>
                                <img src="img/capture.png" class="img-fluid rounded shadow-sm" width="100%" height="500px">
                                <h5><strong>Lưu ý:</strong> <i>Vì đây là trang chung nên không cần phải đăng nhập để đánh giá!</i></h5>
                            </div>
                            <br><br><br>
                            <h3><i class="fa-solid fa-arrow-right"></i> Bước 2: Chọn theo giáo viên, môn học và sinh viên của mình</h3>
                            <div class="card-subtitle">
                                <br><br><br>
                                <img src="img/select.png" class="img-fluid rounded shadow-sm" width="100%" height="350px">
                            </div>
                            <br><br><br>
                            <h3><i class="fa-solid fa-arrow-right"></i> Bước 3: Chọn Gửi đánh giá</h3>
                            <br><br><br>
                            <div class="card-subtitle">
                                <img src="img/gui.png" class="img-fluid rounded shadow-sm" width="100%" height="500px">
                            </div>
                            <br><br><br>
                            <h3><i class="fa-solid fa-arrow-right"></i> Bước 4: Quay về trang chủ chọn Danh sách đánh giá</h3>
                            <div class="card-subtitle">
                                <br><br><br>
                                <img src="img/capture(1).png" class="img-fluid rounded shadow-sm" width="100%" height="500px">
                                <br><br><br>
                                <h5><strong>Lưu ý:</strong><i> Bạn cần phải có quyền xác thực admin mới được phép đăng nhập vào trang này!</i></h5>
                                <img src="img/loginadmin.png" class="img-fluid rounded shadow-sm" width="100%" height="1000px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div style="background: #003768; color: white;">
            <div class="container d-flex">
                <div style="margin: 25px 15px 0 0;">
                    <img src="img/YU_white.png" alt="" style="width: 95px;">
                </div>
                <div style="margin-top: 15px;">
                    <p>Trường Cao Đẳng Công Nghệ Và Quản Trị Sonadezi</p>
                    <p>Địa Chỉ: <span>Số 01, Đường 6A, KCN Biên Hòa II, Biên Hòa, Đồng Nai</span></p>
                    <p>Website: <span>www.sonadezi.edu.vn | Email: info@sonadezi.edu.vn</span></p>
                    <p>Điện thoại: <span>0251.3994.011/012/013 - Fax: 0251.3994.010</span></p>
                </div>
            </div>
        </div>
        <div style="background: #0A314F; color: white;">
            <div class="container text-center py-3">
                Copyright © TTC Edu. All rights reserved
            </div>
        </div>
    </footer>
</body>

<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('#backtop').fadeIn();
            } else {
                $('#backtop').fadeOut();
            }
        })
        $('#backtop').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });
    })
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    document.querySelector('.arrow-next').addEventListener('click', (e) => {
        e.preventDefault();
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    });

    document.querySelector('.arrow-prev').addEventListener('click', (e) => {
        e.preventDefault();
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    });

    showSlide(currentSlide);
</script>


</html>