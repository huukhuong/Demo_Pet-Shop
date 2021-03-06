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
                H??? s?? c???a t??i
                <br>
                <small style="font-size: .9rem;">Qu???n l?? th??ng tin h??? s?? ????? b???o m???t an to??n</small>
            </h4>
        </div>

        <div class="customer-info__infomate mx-4 my-4">
            <form>
                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="username">T??n ????ng nh???p</label>
                    <div class="col-sm-10">
                        <input readonly type="text" name="username" class="form-control border-0" id="username" value="<?php echo $username ?>">
                    </div>
                </div>

                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="fullname">H??? t??n</label>
                    <div class="col-sm-10">
                        <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo $fullname ?>">
                        <small class="text-danger d-none" id="err-fname">Kh??ng ???????c b??? tr???ng tr?????ng n??y</small>
                    </div>
                </div>

                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="fullname">Gi???i t??nh</label>
                    <div class="col-sm-10" style="display: flex; align-items: center;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genderOptions" id="gender_male" value="male" <?php if ($gender == 'Nam') echo "checked" ?>>
                            <label class="form-check-label" for="gender_male">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genderOptions" id="gender_female" value="female" <?php if ($gender == 'N???') echo "checked" ?>>
                            <label class="form-check-label" for="gender_female">N???</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genderOptions" id="gender_other" value="other" <?php if ($gender == 'Kh??c') echo "checked" ?>>
                            <label class="form-check-label" for="gender_other">Kh??c</label>
                        </div>
                    </div>
                </div>

                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="birthday">Ng??y sinh</label>
                    <div class="col-sm-10">
                        <input type="text" name="birthday" class="form-control" id="birthday" value="<?php echo $birthday; ?>">
                        <small class="text-danger d-none" id="err-birth">Sai ?????nh d???ng ng??y</small>
                    </div>
                </div>

                <div class="md-form row mt-2">
                    <label class="col-sm-2 col-form-label text-md-right text-muted" for="phonenumber">??i???n tho???i</label>
                    <div class="col-sm-10">
                        <input type="text" name="phonenumber" class="form-control" id="phonenumber" value="<?php echo $phonenumber ?>">
                        <small class="text-danger d-none" id="err-phone">H??y nh???p ????ng s??? ??i???n tho???i c???a b???n</small>
                    </div>
                </div>
                <div class="d-flex" style="justify-content: center;">
                    <button type="submit" id="btnChange" class="btn mx-2">L??u</button>
                    <button type="button" class="btn mx-2" data-toggle="modal" data-target="#changerPassword">
                        ?????i m???t kh???u
                    </button>
                </div>
            </form>
        </div>

    </div>



    <?php
    include "./templates/footer.php";
    ?>




    <!-- FORM ?????I M???T KH???U -->
    <div class="modal fade" id="changerPassword" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">?????i m???t kh???u</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="md-form">
                            <label for="current-pass">M???t kh???u c??</label>
                            <input type="password" class="form-control" id="current-pass" name="current-pass">
                            <small id="err-password" class="text-danger d-none">Sai m???t kh???u</small>
                        </div>
                        <div class="md-form">
                            <label for="new-password">M???t kh???u m???i</label>
                            <input type="password" class="form-control" id="new-password" name="new-password">
                            <small id="err-new-password" class="text-danger d-none">Kh??ng ???????c ????? tr???ng</small>
                        </div>
                        <div class="md-form">
                            <label for="re-new-password">X??c nh???n m???t kh???u</label>
                            <input type="password" class="form-control" id="re-new-password" name="new-password">
                            <small id="err-re-password" class="text-danger d-none">M???t kh???u x??c nh???n kh??ng kh???p</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn" id="btnChangePass">L??u thay ?????i</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FORM ?????I M???T KH???U -->


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
            $('#err-password').text("Kh??ng ???????c ????? tr???ng");
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
                    $('#err-password').text("M???t kh???u kh??ng ????ng");
                    $('#err-password').removeClass('d-none');
                } else {
                    alert("?????i m???t kh???u th??nh c??ng!");
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
                    alert("S???a th??ng tin th??nh c??ng");
                    location.reload();
                } else {
                    alert("S???a th???t b???i, xem l???i c??c tr?????ng nh???p");
                }
            }
        });
        return false;
    });
</script>