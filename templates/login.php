<!-- LOGIN MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-center">Đăng nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    &times;
                </button>
            </div>
            <form method="POST" action="./service/login-service.php" required>
                <div class="modal-body mt-3">

                    <div class="alert alert-success message_login" role="alert" id="message_success">
                        Đăng nhập thành công! Tự động đăng nhập sau <span id="count_sec">5</span> giây.
                    </div>

                    <div class="alert alert-danger message_login" role="alert" id="message_err">
                        Sai thông tin đăng nhập!
                    </div>

                    <div class="md-form mb-3">
                        <i class="fas fa-user prefix grey-text"></i>
                        <label for="username_login">Tên đăng nhập</label>
                        <input name="username_login" id="username_login" type="text" class="form-control" placeholder="Tên đăng nhập" required>
                    </div>
                    <div class="md-form mb-3">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <label for="password_login">Mật khẩu</label>
                        <input name="password_login" type="password" class="form-control" id="password_login" placeholder="Mật khẩu" required>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center py-0">
                    <button type="submit" id="login_submit" class="btn">Đăng nhập</button>
                </div>
                <p style="display: flex; justify-content: center; align-items: center;" class="py-0">
                    Chưa có tài khoản?
                    <a class="nav-link" type="button" data-toggle="modal" data-target="#registerModal" data-dismiss="modal" aria-label="Close">
                        Đăng ký ngay
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#login_submit").click(function() {
            $('#message_err').css('display', 'none');
            $('#message_success').css('display', 'none');

            let username = $("#username_login").val().trim();
            let password = $("#password_login").val().trim();

            if (username != "" && password != "") {
                $.ajax({
                    url: './service/login-service.php',
                    type: 'post',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        if (response == 0) {
                            $('#message_err').css('display', 'block');
                            $('#message_success').css('display', 'none');
                        } else {
                            $('#message_err').css('display', 'none');
                            $('#message_success').css('display', 'block');
                            countDown();
                        }
                    }
                });
                return false;
            }
        });

        function countDown() {
            let sec = 4;
            let count_sec = $("#count_sec");

            setInterval(function() {
                count_sec.html(sec);
                sec--;
                if (sec < 0) {
                    location.reload();
                }
            }, 1000);
        }

        $("#username_login").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#login_submit").click();
            }
        });

        $("#password_login").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#login_submit").click();
            }
        });
    });
</script>