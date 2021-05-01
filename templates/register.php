<!-- REGISTER MODAL -->
<div class="modal fade mt-0" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Đăng ký</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    &times;
                </button>
            </div>
            <form method="POST" required id="registerForm">
                <div class="modal-body">
                    <div class="alert alert-success" id="message_register">
                        Đăng ký thành công, <a href="./index.php">Bấm vào đây</a> để tiếp tục mua hàng
                    </div>
                    <div class="md-form  mb-2">
                        <label for="fullname_register">Họ tên</label>
                        <input name="fullname_register" type="text" class="form-control" id="fullname_register" placeholder="Họ tên" required>
                        <small id="error_fullname" class="text-danger d-none">Không được để trống trường này</small>
                    </div>
                    <div class="md-form  mb-2">
                        <label for="username_register">Tên đăng nhập</label>
                        <input name="username_register" type="text" class="form-control" id="username_register" placeholder="Tên đăng nhập" required>
                        <small id="error_username" class="text-danger d-none">Không được để trống trường này</small>
                    </div>
                    <div class="md-form  mb-2">
                        <label for="phone_register">Điện thoại</label>
                        <input name="phone_register" type="text" class="form-control" id="phone_register" placeholder="Điện thoại" required minlength="10" maxlength="10">
                        <small id="error_phonenumber" class="text-danger d-none">Định dạng điện thoại không hợp lệ</small>
                    </div>
                    <div class="md-form  mb-2">
                        <label for="password_register">Mật khẩu</label>
                        <input name="password_register" type="password" class="form-control" id="password_register" placeholder="Mật khẩu" required>
                        <small id="error_password" class="text-danger d-none">Không được để trống trường này</small>
                    </div>
                    <div class="md-form  mb-2">
                        <label for="re-password_register">Xác nhận mật khẩu</label>
                        <input name="re-password_register" type="password" class="form-control" id="re-password_register" placeholder="Mật khẩu" required>
                        <small id="error_re-password" class="text-danger d-none">Mật khẩu xác nhận không đúng</small>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center py-0">
                    <button type="submit" id="register_submit" class="btn">Đăng ký</button>
                </div>
                <p style="display: flex; justify-content: center; align-items: center;" class="py-0">
                    Đã có tài khoản?
                    <a class="nav-link" type="button" data-toggle="modal" data-target="#loginModal" data-dismiss="modal" aria-label="Close">
                        Đăng nhập
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>


<!-- AJAX -->
<script>
    $(document).ready(function() {
        $("#register_submit").click(function() {
            let flag = true;

            let fullname = $("#fullname_register").val().trim();
            let username = $("#username_register").val().trim();
            let phonenumber = $("#phone_register").val().trim();
            let password = $("#password_register").val().trim();
            let re_password = $("#re-password_register").val().trim();


            $("#error_fullname").addClass('d-none');
            $('#error_username').addClass('d-none');
            $('#error_phonenumber').addClass('d-none');
            $('#error_password').addClass('d-none');
            $('#error_re-password').addClass('d-none');

            if (password.localeCompare(re_password) || re_password == "") {
                $('#error_re-password').removeClass('d-none');
                $("#re-password_register").focus();
                flag = false;
            }
            if (password == "") {
                $('#error_password').removeClass('d-none');
                $('#password_register').focus();
                flag = false;
            }
            var regexPhone = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            if (!phonenumber.match(regexPhone) || phonenumber[0] != 0) {
                $('#error_phonenumber').removeClass('d-none');
                $("#phone_register").focus();
                flag = false;
            }
            $("#phone_register").css('border-color', '#ccc');
            if (username == "") {
                $('#error_username').removeClass('d-none');
                $("#username_register").focus();
                flag = false;
            }
            if (fullname == "") {
                $("#error_fullname").removeClass('d-none');
                $("#fullname_register").focus();
                flag = false;
            }

            if (!flag)
                return flag;

            $.ajax({
                url: './service/register-service.php',
                type: 'post',
                data: {
                    fullname: fullname,
                    username: username,
                    phonenumber: phonenumber,
                    password: password,
                    re_password: re_password
                },
                success: function(response) {
                    if (response == 0) {
                        $('#error_username').text("Tên đăng nhập đã tồn tại");
                        $('#error_username').removeClass('d-none');
                    } else if (response == 1) {
                        $('#message_register').css('display', 'block');
                    } else alert(response);
                }
            });

            return false;
        });

    });
</script>