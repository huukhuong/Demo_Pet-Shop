$(document).ready(function () {
    // Đăng nhập bằng AJAX
    $('#btn_login').click(function () {
        let username = $('#username').val();
        let password = $('#password').val();
        let txt_user = $('#username');
        let txt_password = $('#password');
        txt_user.css('border-color', '#333');
        txt_password.css('border-color', '#333');

        if ($.trim(username).length > 0 && $.trim(password).length > 0) {
            $.ajax({
                url: './service/login_service.php',
                method: 'post',
                data: {
                    username: username,
                    password: password
                },
                success: function (data) {
                    if (data) {
                        successLogin();
                    } else {
                        $('#message_err').css('display', 'block');
                    }
                }
            });
        } else {
            if ($.trim(username).length <= 0) {
                txt_user.css('border-color', 'red');
            }
            if ($.trim(password).length <= 0) {
                txt_password.css('border-color', 'red');
            }
            return false;
        }
    });

    function successLogin() {
        $('#message_err').css('display', 'none');
        $('#message_success').css('display', 'block');
        let i = 4;
        let seconds = $('#seconds-count');
        setInterval(function () {
            seconds.html(i);
            i--;
            if (i < 0) {
                location.reload();
            }
        }, 1000);
    }

    $("#username").keyup(function (event) {
        if (event.keyCode === 13) {
            $("#btn_login").click();
        }
    });

    $("#password").keyup(function (event) {
        if (event.keyCode === 13) {
            $("#btn_login").click();
        }
    });
});