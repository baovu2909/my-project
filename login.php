<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #212529;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
        }
    </style>

</head>

<body>
    <div class="login-box">
        <div class="card shadow rounded p-4 bg-dark text-white">
            <div class="text-center mb-4">
                <h2>Đăng nhập</h2>
            </div>
            <div>
                <form action="" method="Post">
                    <div data-mdb-input-init class="form-outline mb-4 px-5">
                        <label class="form-label" for="form2Example1">Tài khoản</label>
                        <input type="text" id="form2Example1" class="form-control" name="txtTK">

                    </div>

                    <div data-mdb-input-init class="form-outline mb-4 px-5">
                        <label class="form-label" for="form2Example2">Mật khẩu</label>
                        <input type="text" id="form2Example2" class="form-control" name="txtMK">

                    </div>
                    <div class="container d-flex justify-content-center">
                        <button name="btnDangNhap" class="btn btn-primary btn-block mb-4 mx-4" >Đăng nhập</button>
                        <button name="btnQuaylai" class="btn btn-secondary btn-block mb-4 mx-4">Quay lại</button>
                    </div>

                    <?php
                    require('connect.php');
                    session_start();
                    if (isset($_POST['btnDangNhap'])) {
                        $user = $_POST['txtTK'];
                        $pass = $_POST['txtMK'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_account WHERE TaiKhoan = '$user' AND MatKhau = '$pass'");
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            $_SESSION['user'] = $user;
                            header('location: listrate.php');
                        } else {
                            echo "<script>alert('Tài khoản hoặc mật khẩu bị sai. Vui lòng nhập lại!')</script>";
                        }
                    }
                    if(isset($_POST['btnQuaylai'])){
                        header('location: main.php');
                    }
                    ?>

                </form>
            </div>
        </div>

</body>

</html>