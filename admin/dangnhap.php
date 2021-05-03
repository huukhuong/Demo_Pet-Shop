<?php
session_start();
?>
<html>

<head>
    <title>Trang đăng nhập</title>
    <meta charset="utf-8">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php

    require_once('../libs/dbhelper.php');
    // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
    if (isset($_POST["btn_submit"])) {
        // lấy thông tin người dùng
        $username = $_POST["username"];
        $password = $_POST["password"];
        //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
        //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
        if ($username == "" || $password == "") {
            echo "username hoặc password bạn không được để trống!";
        } else {
            $con = mysqli_connect("localhost", "root", "", "petshop");



            if ($con->error) {
                die("Connection failed: " . mysqli_error($con));
            }

            //close connection

            $sql = "select * from taikhoan where TenDangNhap = '$username' and MatKhau = '$password' ";
            $query = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows == 0) {
                
                echo '<script>
                swal({
                title: "Tên Đăng Nhập Không Đúng",
                text: "Nhấn vào đây để đăng nhập!",
            icon: "warning",
            button: "Xác Nhận",
            });
            </script>';
            } else {
                echo '<script>
                swal({
                title: "Đăng Nhập Thành Công",
                text: "Nhấn vào đây để đăng nhập!",
            icon: "success",
            button: "Xác Nhận!",
            });
            </script>';
               
                //tiến hành lưu tên đăng nhập vào session 
                $_SESSION['username-admin'] = $username;

                sleep(1);
                header('Location: index.php');
            }
            mysqli_close($con);
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded shadow shadow-sm">
                            <div class="card-header">
                                <h3 class="mb-0">ĐĂNG NHẬP</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST" action="dangnhap.php">
                                    <div class="form-group">
                                        <label for="uname1">Tài Khoản</label>
                                        <input type="text" class="form-control form-control-lg rounded-0" name="username" id="username" required="">
                                        <div class="invalid-feedback">Không được bỏ trống</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật Khẩu</label>
                                        <input type="password" class="form-control form-control-lg rounded-0" id="password" name="password" required="" autocomplete="new-password">
                                        <div class="invalid-feedback">Không được bỏ trống</div>
                                    </div>
                                    <div>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin" name="btn_submit">Đăng Nhập</button>
                                </form>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->

                    </div>


                </div>
                <!--/row-->

            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->
</body>
<script>
    $("#btnLogin").click(function(event) {


        var form = $("#formLogin")

        if (form[0].checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.addClass('was-validated');
    });
</script>


</html>