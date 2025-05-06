<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá giáo viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            width: 100%;
            height: auto;
            background-color: #f5f5f5;
            margin: 50 auto;
            background-color: white;
        }

        .table-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
        }

        .rating {
            display: flex;
            gap: 10px;
            justify-self: unset;
        }


        .comment {
            width: 100%;
            margin: 50px auto;
            text-align: center;
        }

        @media (max-width : 1000px) {
            .comment {
                width: 100%;
                margin: 50px auto;
                padding: 0 15px;
                text-align: left;
            }

            textarea {
                text-align: left;
            }
        }

        .selectcenter {
            text-align: center;
            margin-top: 20px;
        }

        .selectcenter select {
            padding: 5px 10px;
            font-size: 16px;
        }

        .center_giaovien {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>

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
            <div class="container-fluid my-3">
            </div>
        </nav>
    </header>
    <div class="container">
        <form action="" method="post">
            <div class="selectcenter">
                <h1>BẢNG ĐÁNH GIÁ GIÁO VIÊN</h1>
                <div class="row p-5">
                    <div class="col-lg-4 col-md-5 col-sm-10">
                        <label>Chọn giáo viên:</label>
                        <select name="giaovien" onchange="this.form.submit()">
                            <option value="">--------- Chọn ---------</option>

                            <?php
                            require('connect.php');
                            $result = mysqli_query($conn, "SELECT * FROM tbl_giaovien");
                            $GVselected = $_POST['giaovien'] ?? '';
                            while ($row = mysqli_fetch_assoc($result)) {
                                $TenGV = $row['TenGV'];
                                $selected = ($row['MaGV'] == $GVselected) ? 'selected' : '';
                                echo "<option value= '" . $row['MaGV'] . "'$selected>" . $TenGV . "</option>";
                            }

                            ?>
                        </select>
                    </div>

                    <div class="col-lg-4  col-md-5 col-sm-10">
                        <label>Chọn môn học:</label>
                        <select name="bomon" onchange="this.form.submit()">
                            <option value="">--------- Chọn ---------</option>

                            <?php
                            if (!empty($GVselected)) {
                                $resultbm = mysqli_query($conn, "SELECT * FROM tbl_bomon WHERE MaGV = '$GVselected'");
                                $BMselected = $_POST['bomon'] ?? '';
                                while ($row = mysqli_fetch_assoc($resultbm)) {
                                    $BM = $row['TenBM'];
                                    $selected = ($row['MaBoMon'] == $BMselected) ? 'selected' : '';
                                    echo "<option value='" . $row['MaBoMon'] . "' $selected>" . $BM . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-10">
                        <label>Chọn sinh viên:</label>
                        <select name="sinhvien">
                            <option value="">--------- Chọn ---------</option>

                            <?php
                            if (!empty($GVselected)) {
                                $resultsv = mysqli_query($conn, "SELECT * FROM tbl_sinhvien Where MaGV = '$GVselected'");
                                $SVselected = $_POST['sinhvien'] ?? '';
                                while ($row = mysqli_fetch_assoc($resultsv)) {
                                    $MaSV = $row['MaSV'];
                                    $TenSV = $row['TenSV'];
                                    $selected = ($MaSV == $SVselected) ? 'selected' : '';
                                    echo "<option value= '" . $MaSV  . "'$selected>" . $TenSV . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <input type="submit" value="Lọc" class="btn btn-success pb-2 pe-2 ps-2">
                    </div>

                </div>


            </div>
            <?php
            if (!empty($SVselected)):
            ?>

                <div class="center_giaovien">
                    <div class="row">
                        <div class="col-sm-4"><label><strong>Mã giáo viên : </strong><?php echo "<i>" . $GVselected . "</i>"; ?></label></div>
                        <div class="col-sm-4"><label><strong>Mã môn học: </strong> <?php echo "<i>" . $BMselected . "</i>"; ?></label></div>
                        <div class="col-sm-4"><label><strong>Mã sinh viên : </strong> <?php echo "<i>" . $SVselected . "</i>"; ?></label></div>
                    </div>
                </div>
                <br><br>
                <div class="row text-center">
                    <div class="col-sm-2"><label>1 <i class="fa-solid fa-star"></i>: Rất không hài lòng </label></div>
                    <div class="col-sm-2"><label>2 <i class="fa-solid fa-star"></i>: Không hài lòng </label></div>
                    <div class="col-sm-2"><label>3 <i class="fa-solid fa-star"></i>: Bình thường </label></div>
                    <div class="col-sm-2"><label>4 <i class="fa-solid fa-star"></i>: Hài lòng </label></div>
                    <div class="col-sm-2"><label>5 <i class="fa-solid fa-star"></i>: Rất hài lòng </label></div>
                </div>

                <br><br>
                <div class="container">
                    <table class="table table-bordered p-5">
                        <tr class="table table-info">
                            <th>STT</th>
                            <th>Nội dung</th>
                            <th colspan="5">Điểm đánh giá</th>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td>1 <i class="fa-solid fa-star"></i></td>
                            <td>2 <i class="fa-solid fa-star"></i></td>
                            <td>3 <i class="fa-solid fa-star"></i></td>
                            <td>4 <i class="fa-solid fa-star"></i></td>
                            <td>5 <i class="fa-solid fa-star"></i></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Giảng bài dễ hiểu</td>

                            <td>
                                <input type="radio" name="diem1" value="1">
                            </td>
                            <td><input type="radio" name="diem1" value="2"></td>
                            <td><input type="radio" name="diem1" value="3"></td>
                            <td><input type="radio" name="diem1" value="4"></td>
                            <td><input type="radio" name="diem1" value="5"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Thái độ tích cực trong giờ giảng dạy</td>
                            <td>

                                <input type="radio" name="diem2" value="1">
                            </td>
                            <td><input type="radio" name="diem2" value="2"></td>
                            <td><input type="radio" name="diem2" value="3"></td>
                            <td><input type="radio" name="diem2" value="4"></td>
                            <td><input type="radio" name="diem2" value="5">
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ứng xử với sinh viên</td>
                            <td>

                                <input type="radio" name="diem3" value="1">
                            </td>
                            <td><input type="radio" name="diem3" value="2"></td>
                            <td><input type="radio" name="diem3" value="3"></td>
                            <td><input type="radio" name="diem3" value="4"></td>
                            <td><input type="radio" name="diem3" value="5">
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Tác phong trong công việc</td>
                            <td>

                                <input type="radio" name="diem4" value="1">
                            </td>
                            <td><input type="radio" name="diem4" value="2"></td>
                            <td><input type="radio" name="diem4" value="3"></td>
                            <td><input type="radio" name="diem4" value="4"></td>
                            <td><input type="radio" name="diem4" value="5">

                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Bảo đảm kiến thức chuyên môn</td>
                            <td>

                                <input type="radio" name="diem5" value="1">
                            </td>
                            <td><input type="radio" name="diem5" value="2"></td>
                            <td><input type="radio" name="diem5" value="3"></td>
                            <td><input type="radio" name="diem5" value="4"></td>
                            <td><input type="radio" name="diem5" value="5"></i>

                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Xây dựng kế hoạch dạy học</td>
                            <td>
                                <input type="radio" name="diem6" value="1">
                            </td>
                            <td><input type="radio" name="diem6" value="2"></td>
                            <td><input type="radio" name="diem6" value="3"></td>
                            <td><input type="radio" name="diem6" value="4"></td>
                            <td><input type="radio" name="diem6" value="5">
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Bảo đảm đúng chương trình môn học cần thiết</td>
                            <td>
                                <input type="radio" name="diem7" value="1">
                            </td>
                            <td><input type="radio" name="diem7" value="2"></td>
                            <td><input type="radio" name="diem7" value="3"></td>
                            <td><input type="radio" name="diem7" value="4"></td>
                            <td><input type="radio" name="diem7" value="5">
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Biết cách vận dụng kiến thức vào thực tiễn hoặc những nơi công sở</td>
                            <td>
                                <input type="radio" name="diem8" value="1">
                            </td>
                            <td><input type="radio" name="diem8" value="2"></td>
                            <td><input type="radio" name="diem8" value="3"></td>
                            <td><input type="radio" name="diem8" value="4"></td>
                            <td><input type="radio" name="diem8" value="5">
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Phát hiện những vấn đề và giải quyết nhanh chóng, linh hoạt trong công việc</td>
                            <td>
                                <input type="radio" name="diem9" value="1">
                            </td>
                            <td><input type="radio" name="diem9" value="2"></td>
                            <td><input type="radio" name="diem9" value="3"></td>
                            <td><input type="radio" name="diem9" value="4"></td>
                            <td><input type="radio" name="diem9" value="5">
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Kiểm tra, đánh giá kết quả của từng sinh viên trong lớp</td>
                            <td>
                                <input type="radio" name="diem10" value="1">
                            </td>
                            <td><input type="radio" name="diem10" value="2"></td>
                            <td><input type="radio" name="diem10" value="3"></td>
                            <td><input type="radio" name="diem10" value="4"></td>
                            <td><input type="radio" name="diem10" value="5">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="comment">
                    <div class="form-group">
                        <label class="form-label">Nhận xét chung:</label>
                        <textarea name="nhanxet" id="nhanxet" rows="6" class="form-control" style="resize: none;"
                            placeholder="Nhập nhận xét chung ở đây..."></textarea>
                    </div>
                    <div class="mt-4">
                        <button name="btndanhgia" class="btn btn-primary me-2">Gửi đánh giá</button>
                        <button name="btnquaylai" class="btn btn-secondary">Quay lại</button>
                    </div>
                </div>

            <?php
            endif;
            if (isset($_POST['btndanhgia'])) {
                $gv = $_POST['giaovien'];
                $sv_ma = $_POST['sinhvien'];
                $bomon = $_POST['bomon'];
                $sv_query = mysqli_query($conn, "SELECT TenSV FROM tbl_sinhvien WHERE MaSV = '$sv_ma'");
                $sv_row = mysqli_fetch_assoc($sv_query);
                $sv_ten = $sv_row['TenSV'];
                $nhanxet = $_POST['nhanxet'] ?? '';
                $Tong = 0;
                for ($i = 1; $i <= 10; $i++) {
                    $diemKey = 'diem' . $i;
                    if (isset($_POST[$diemKey])) {
                        $diem = $_POST[$diemKey];
                        $Tong += ($diem - 1) * 0.25;
                    }
                }

                if ($Tong>= 8.5) {
                    $Tong = 'A';
                } elseif ($Tong >= 7.0) {
                    $Tong = 'B';
                } elseif ($Tong >= 5.5) {
                    $Tong = 'C';
                } else {
                    $Tong = 'D';
                }
                $resultinsert = mysqli_query($conn, "INSERT INTO tbl_danhgia(MaGV, MaBoMon, TenSV, Diem, NhanXet) VALUES ('$gv','$bomon','$sv_ten','$Tong','$nhanxet')");
                echo "<script>alert ('Gửi đánh giá thành công!!!')</script>";
            }
            if (isset($_POST['btnquaylai'])) {
                echo "<script>window.location.href='main.php';</script>";
                exit();
            }
            ?>
        </form>
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

</html>