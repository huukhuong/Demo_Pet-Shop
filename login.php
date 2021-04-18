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
	<link rel="stylesheet" href="./css/login.css">

</head>
<div class="container-fluid">
	<div class="container">
		<div class="row text-center">
			<div class="login-wrap my-5 mx-auto col">
				<h1 class="text-center pt-5 pb-3 my-0">Đăng nhập</h1>
				<div class="alert alert-danger" id="message_err">
					<b>Thông tin đăng nhập không đúng!</b> <br> Vui lòng kiểm tra lại
				</div>
				<div class="alert alert-success" id="message_success">
					<b>Đăng nhập thành công!</b> <br>
					Bạn sẽ được chuyển về <a href="./index.php" class="log-link">Trang chủ</a>
					sau <span id="seconds-count">5</span> giây.
				</div>
				<div class="row text-center">
					<div class="col">
						<form id="myForm" name="myForm" method="post">
							<div class="form-group text-left">
								<input type="text" id="username" name="username" class="form-control" autofocus placeholder="Tên đăng nhập">
							</div>
							<div class="form-group text-left">
								<input type="password" id="password" name="password" class="form-control" autocomplete="on" placeholder="Mật khẩu">
								<a class="log-link" href="#">Quên mật khẩu?</a>
							</div>
							<button type="button" id="btn_login" name="btn_submit" class="btn btn_login">Đăng nhập</button>
							<p class="pt-4">
								Lần đầu truy cập?
								<a class="log-link" href="./register.php">Đăng ký tài khoản</a>
							</p>
							<p class="pt-4">
								<a class="log-link" href="./index.php">Về trang chủ</a>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<i class="fas fa-paw" style="top: 25%; left: 25px; transform: rotate(45deg);"></i>
	<i class="fas fa-bone" style="bottom: 30%; right: 25px; transform: rotate(45deg);"></i>
</div>


<?php
include("./templates/footer.php");
?>

<script src="./js/login.js"></script>