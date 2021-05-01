<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3KS Pet Shop</title>
    <!-- BOOTSTRAP 4.5 -->
    <link rel="stylesheet" href="./css/bootstrap-4.5/bootstrap.min.css">
    <!-- FONTAWESOME 5.15.3-->
    <link rel="stylesheet" href="./fonts/fontawesome-5.15.3/css/all.min.css">
    <!-- RESET CSS -->
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="./css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl-carousel/owl.theme.default.min.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/content.css">

    <!-- JQUERY 3.5.1 -->
    <script src="./js/jquery-3.5.1/jquery-3.3.1.slim.min.js"></script>

</head>


<style>
    .customer-info__header {
        color: #333;
    }
</style>

<body style="background-color: #F5F5F5;">
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    include "./templates/header.php";
    $username = $_SESSION['username'];
    include "./service/config.php";

    $sql = "SELECT * FROM KhachHang WHERE TenDangNhap='$username'";
    $result = mysqli_query($conn, $sql);

    $fullname = "";
    $gender = "";
    $birth = "";
    $phonenumber = "";

    while ($row = mysqli_fetch_array($result)) {
        $fullname = $row['HoTen'];
        $gender = $row['GioiTinh'];
        $birth = $row['NgaySinh'];
        $phonenumber = $row['DienThoai'];
    }

    $birthday = date_parse($birth);
    // var_dump($birthday);

    $birthday = $birthday['day'] . "/" . $birthday['month'] . "/" . $birthday['year'];

    ?>


    <div class="container bg-white my-4 border">
        <div class="customer-info__header mx-4 my-4 border-bottom">
            <h4 class="mt-2 ml-2">
                Hồ sơ của tôi
                <br>
                <small style="font-size: .9rem;">Quản lý thông tin hồ sơ để bảo mật an toàn</small>
            </h4>
        </div>

        <div class="customer-info__infomate mx-4 my-4">
            <form>
                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="username">Tên đăng nhập</label>
                    <div class="col-sm-10">
                        <input readonly type="text" name="username" class="form-control border-0" id="username" value="<?php echo $username ?>">
                    </div>
                </div>

                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="fullname">Họ tên</label>
                    <div class="col-sm-10">
                        <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo $fullname ?>">
                        <small class="text-danger d-none" id="err-fname">Không được bỏ trống trường này</small>
                    </div>
                </div>

                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="fullname">Giới tính</label>
                    <div class="col-sm-10" style="display: flex; align-items: center;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genderOptions" id="gender_male" value="male" <?php if ($gender == 'Nam') echo "checked" ?>>
                            <label class="form-check-label" for="gender_male">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genderOptions" id="gender_female" value="female" <?php if ($gender == 'Nữ') echo "checked" ?>>
                            <label class="form-check-label" for="gender_female">Nữ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genderOptions" id="gender_other" value="other" <?php if ($gender == 'Khác') echo "checked" ?>>
                            <label class="form-check-label" for="gender_other">Khác</label>
                        </div>
                    </div>
                </div>

                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="birthday">Ngày sinh</label>
                    <div class="col-sm-10">
                        <input type="text" name="birthday" class="form-control" id="birthday" value="<?php echo $birthday; ?>">
                        <small class="text-danger d-none" id="err-birth">Sai định dạng ngày</small>
                    </div>
                </div>

                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="phonenumber">Điện thoại</label>
                    <div class="col-sm-10">
                        <input type="text" name="phonenumber" class="form-control" id="phonenumber" value="<?php echo $phonenumber ?>">
                        <small class="text-danger d-none" id="err-phone">Hãy nhập đúng số điện thoại của bạn</small>
                    </div>
                </div>
                <div class="d-flex" style="justify-content: center;">
                    <button type="submit" id="btnChange" class="btn mx-2">Lưu</button>
                    <button type="button" class="btn mx-2" data-toggle="modal" data-target="#changerPassword">
                        Đổi mật khẩu
                    </button>
                </div>
            </form>
        </div>

    </div>



    <?php
    include "./templates/footer.php";
    ?>




    <!-- FORM ĐỔI MẬT KHẨU -->
    <div class="modal fade" id="changerPassword" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đổi mật khẩu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="md-form">
                            <label for="current-pass">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="current-pass" name="current-pass">
                            <small id="err-password" class="text-danger d-none">Sai mật khẩu</small>
                        </div>
                        <div class="md-form">
                            <label for="new-password">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="new-password" name="new-password">
                            <small id="err-new-password" class="text-danger d-none">Không được để trống</small>
                        </div>
                        <div class="md-form">
                            <label for="re-new-password">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="re-new-password" name="new-password">
                            <small id="err-re-password" class="text-danger d-none">Mật khẩu xác nhận không khớp</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn" id="btnChangePass">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FORM ĐỔI MẬT KHẨU -->


</body>



<script>
    $('#btnChangePass').click(function() {
        $('#re-new-password').css('border-color', '#ccc');
        $('#err-re-password').addClass('d-none');
        $('#new-password').css('border-color', '#ccc');
        $('#err-new-password').addClass('d-none');
        $('#current-pass').css('border-color', '#ccc');
        $('#err-password').addClass('d-none');

        let current_pass = $('#current-pass').val();
        let new_pass = $('#new-password').val();
        let re_newPass = $('#re-new-password').val();
        let flag = true;

        if (new_pass.localeCompare(re_newPass)) {
            $('#re-new-password').css('border-color', 'red');
            $('#err-re-password').removeClass('d-none');
            flag = false;
        }

        if (new_pass.trim() == "") {
            $('#new-password').css('border-color', 'red');
            $('#err-new-password').removeClass('d-none');
            flag = false;
        }

        if (current_pass.trim() == "") {
            $('#current-pass').css('border-color', 'red');
            $('#err-password').text("Không được để trống");
            $('#err-password').removeClass('d-none');
            flag = false;
        }

        if (!flag)
            return false;

        $.ajax({
            url: "./service/account-service.php",
            method: "POST",
            data: {
                action: 'changePass',
                current_pass: current_pass,
                new_pass: new_pass
            },
            success: function(data) {
                if (data == 0) {
                    $('#current-pass').css('border-color', 'red');
                    $('#err-password').text("Mật khẩu không đúng");
                    $('#err-password').removeClass('d-none');
                } else {
                    alert("Đổi mật khẩu thành công!");
                    location.reload();
                }
            }
        });

        return false;
    });


    $('#btnChange').click(function() {
        let flag = true;
        $('#err-phone').addClass('d-none');
        $('#err-birth').addClass('d-none');
        $('#err-fname').addClass('d-none');
        $('#phonenumber').css('border-color', '#ccc');
        $('#birthday').css('border-color', '#ccc');
        $('#fullname').css('border-color', '#ccc');

        let username = $('#username').val();
        let fullname = $('#fullname').val();
        let gender = $("input[type='radio']:checked").val();
        let birthday = $('#birthday').val();
        let phonenumber = $('#phonenumber').val();

        var regexPhone = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        if (!phonenumber.match(regexPhone) || phonenumber[0] != 0) {
            $('#phonenumber').css('border-color', 'red');
            $('#err-phone').removeClass('d-none');
            flag = false;
        }

        var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
        if (!birthday.match(dateformat)) {
            $('#birthday').css('border-color', 'red');
            $('#err-birth').removeClass('d-none');
            flag = false;
        }

        if (fullname.trim() == "") {
            $('#fullname').css('border-color', 'red');
            $('#err-name').removeClass('d-none');
            flag = false;
        }

        if (!flag)
            return false;

        $.ajax({
            url: "./service/account-service.php",
            method: "POST",
            data: {
                username: username,
                fullname: fullname,
                gender: gender,
                birthday: birthday,
                phonenumber: phonenumber
            },
            success: function(res) {
                if (res == 1) {
                    alert("Sửa thông tin thành công");
                    location.reload();
                } else {
                    alert("Sửa thất bại, xem lại các trường nhập");
                }
            }
        });
        return false;
    });
</script>