<?php require('connect.php'); ?>
<?php
if (isset($_POST['btnQuaylai'])) {
    header('location: main.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách đánh giá</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f5f5f5;
        }

        .table-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .selectcenter {
            text-align: center;
            margin-top: 20px;
        }

        .table td,
        .table th {
            vertical-align: middle;
            white-space: nowrap;
            font-size: 14px;
            padding: 8px;
        }

        @media (max-width: 1000px) {

            .table td,
            .table th {
                font-size: 10px;
                padding: 5px;
            }
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['btnDelete'])) {
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
        $Fillselected = mysqli_real_escape_string($conn, $_POST['Fillselected']);
        mysqli_query($conn, "DELETE FROM tbl_danhgia WHERE MaDG = '$delete_id'");
    }


    $Fillselected = isset($_GET['giaovien']) ? $_GET['giaovien'] : '';
    ?>
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
        <form action="" method="get">
            <div class="selectcenter">
                <h1>DANH SÁCH ĐÁNH GIÁ</h1>
                <select class="form-select-sm" style="width: 250px;" name="giaovien" id="giaovien">
                    <option value="" style="text-align: center;">------- Chọn giáo viên -------</option>
                    <?php
                    $resultfill = mysqli_query($conn, "SELECT DISTINCT TenGV FROM tbl_giaovien");
                    while ($row = mysqli_fetch_assoc($resultfill)) {
                        $TenGV = $row['TenGV'];
                        $selected = ($Fillselected == $TenGV) ? 'selected' : '';
                        echo "<option value='$TenGV' $selected>$TenGV</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Lọc" class="btn btn-success">
            </div>
        </form>
    </div>

    <br>

    <?php if (!empty($Fillselected)): ?>
        <div class="container px-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <tr class="table table-info">
                        <th>Mã đánh giá</th>
                        <th>Tên giáo viên</th>
                        <th>Bộ môn</th>
                        <th>Tên sinh viên</th>
                        <th>Thang điểm</th>
                        <th>Nhận xét của sinh viên</th>
                        <th>Chức năng</th>

                        <?php
                        $gv = mysqli_real_escape_string($conn, $Fillselected);
                        $resultds = mysqli_query($conn, "SELECT dg.MaDG, gv.TenGV, bm.TenBM, dg.TenSV, dg.Diem, dg.NhanXet 
                                                         FROM tbl_danhgia dg 
                                                         INNER JOIN tbl_giaovien gv ON dg.MaGV = gv.MaGV 
                                                         INNER JOIN tbl_bomon bm ON dg.MaBoMon = bm.MaBoMon
                                                         WHERE gv.TenGV = '$gv'
                                                         ORDER BY gv.TenGV, dg.TenSV, bm.TenBM
");

                        while ($row = mysqli_fetch_assoc($resultds)) {
                            echo "<tr>";
                            echo "<td>" . $row['MaDG'] . "</td>";
                            echo "<td>" . $row['TenGV'] . "</td>";
                            echo "<td>" . $row['TenBM'] . "</td>";
                            echo "<td>" . $row['TenSV'] . "</td>";
                            echo "<td>" . $row['Diem'] . "</td>";
                            echo "<td>" . $row['NhanXet'] . "</td>";
                            echo "<td>
                                    <form method='post' onsubmit=\"return confirm('Bạn có chắc muốn xóa không?');\">
                                        <input type='hidden' name='delete_id' value='" . $row['MaDG'] . "'>
                                        <input type='hidden' name='Fillselected' value='" . $gv . "'>
                                        <button type='submit' name='btnDelete' class='btn btn-danger btn-sm'>Xóa</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <form method="post">
                <button name="btnQuaylai" class="btn btn-primary">Quay lại</button>
                <br>
                <br>
            </form>
        </div>
        </div>
    <?php endif; ?>

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