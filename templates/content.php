<!-- HOME PAGE -->
<section class="home" id="home">
	<div class="content">
		<span>Chăm sóc thú cưng của bạn</span>
		<h3>Ưu đãi cho khách hàng <br> đăng ký lần đầu</h3>
		<a href="#" class="btn" type="button" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Đăng ký ngay</a>
	</div>
</section>
<!-- END HOME PAGE -->

<!-- CATEGORY -->
<section class="category" id="category">
	<h1 class="heading my-2"><i class="fas fa-paw"></i> Danh mục <i class="fas fa-paw"></i></h1>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4 col-12 mt-5" style="width: 100%;">
				<div class="card">
					<img class="card-img-top" src="./img/page-img/cate1.jpg">
					<div class="card-body">
						<h5 class="card-title">Thức ăn thú cưng</h5>
						<a href="./shop.php" class="btn">Xem ngay</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-12 mt-5">
				<div class="card">
					<img class="card-img-top" src="./img/page-img/cate2.jpg">
					<div class="card-body">
						<h5 class="card-title">Phụ kiện, đồ chơi</h5>
						<a href="./shop.php" class="btn">Xem ngay</a>
					</div>
				</div>
			</div>

		</div>
	</div>

</section>
<!-- END CATEGORY -->

<!-- FEATURED -->
<section class="featured" id="featured">
	<h1 class="heading"><i class="fas fa-paw"></i> Độc quyền shop <i class="fas fa-paw"></i></h1>
	<div class="row">
		<div class="col-lg-6 col-sm-12 content">
			<div class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="./img/product-img/p1.webp" class="card-img" alt="">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h4 class="card-title">Pate cao cấp size lớn cho chó</h4>
							<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
								ab excepturi illo</p>
							<a href="./shop.php" class="btn">Vào shop ngay</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-sm-12 content">
			<div class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="./img/product-img/p2.webp" class="card-img" alt="">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h4 class="card-title">Pate cao cấp size lớn cho mèo</h4>
							<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
								ab excepturi illo</p>
							<a href="./shop.php" class="btn">Vào shop ngay</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END FEATURED -->

<!-- DEAL -->
<section class="deal">
	<span>Giảm tới 40%</span>
	<h3>Phụ kiện, quần áo thú cưng</h3>
	<a href="./shop.php" class="btn">Xem chi tiết</a>
</section>
<!-- END DEAL -->

<!-- PRODUCT -->
<section class="products" id="products">
	<h1 class="heading"><i class="fas fa-paw"></i> Mới nhất <i class="fas fa-paw"></i></h1>
	<div class="container">
		<div class="owl-carousel owl-theme">

			<?php
			include("./service/config.php");
			$sql = "SELECT * FROM sanpham ORDER BY MaSP DESC LIMIT 10";
			$result = mysqli_query($conn, $sql);
			$num_row = mysqli_num_rows($result); // lấy ra số dòng truy vấn được
			if ($num_row > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
			?>

					<div class="item">
						<div class="card" style="width: 100%; height: 100%;">
							<div class="card__img-wrap" style="background-image: url('<?php echo $row['HinhAnh']; ?>');"></div>
							<div class="card-body">
								<h5 class="card-title text-truncate"><?php echo $row['TenSP']; ?></h5>
								<p class="card-text text-truncate" style="max-width:100%;"><?php echo $row['MoTaSanPham']; ?></p>
								<p class="car-price">
									<?php
									echo number_format($row['DonGia'], 0, '', ',') . 'đ';;
									?>
								</p>
								<a class='btn' onclick='return showProductDetail(<?php echo $row["MaSP"] ?>);'>
									Thêm vào giỏ hàng
								</a>
							</div>
						</div>
					</div>

			<?php
				}
			}
			?>

		</div>
	</div>
</section>
<!-- END PRODUCT -->

<!-- OFFER -->
<section class="offer">
	<h1 class="heading"><i class="fas fa-paw"></i> 3KS Shop <i class="fas fa-paw"></i></h1>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12 offer-box" style="z-index: 1;">
				<img src="./img/page-img/offer-img1.webp" alt="">
				<div class="offer-content">
					<span>Yêu thương, tận tình</span>
					<h3>Phục vụ <br> bằng cả trái tim</h3>
					<a class="btn" type="button" data-toggle="modal" data-target="#registerModal" data-dismiss="modal" style="background-color: #fff;">Đăng ký nhanh</a>
				</div>
			</div>
			<div class="col-md-6 col-12 offer-box">
				<img src="./img/page-img/offer-img2.webp" alt="">
				<div class="offer-content">
					<span>An toàn, dinh dưỡng</span>
					<h3>Chất lượng <br> trong từng sản phẩm</h3>
					<a href="./shop.php" class="btn">Mua sắm ngay</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END OFFER -->

<!-- CONTACT -->
<section class="contact" id="contact">
	<h1 class="heading"><i class="fas fa-paw"></i> 3KS Team <i class="fas fa-paw"></i></h1>

	<div class="about-us" id="about-us">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6 col-12 mx-auto">
					<div class="card-member">
						<span>1</span>
						<div class="img-member">
							<img src="./img/3KSTeam/Son.png" alt="" class="img-member--img">
						</div>
						<div class="descibtion-member">
							<h3>Le Thai Thanh Son</h3>
							<h4>MSV: 3119410354</h4>
							<p>lethaithanhson018@gmail.com</p>
						</div>
						<div class="info-member">
							<a href="https://www.facebook.com/profile.php?id=100041348190068" class="mem-fb-link">
								<i class="fab fa-facebook-f mem-fb-icon"></i>
							</a>
							<a href="https://zalo.me/0858686897" class="mem-zalo-link"><img src="./img/content/link-icon/zalo-seeklogo.com.svg" alt="" class="mem-zalo-icon"></a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-12 mx-auto">
					<div class="card-member">
						<span>2</span>
						<div class="img-member">
							<img src="./img/3KSTeam/Khuong.png" alt="" class="img-member--img">
						</div>
						<div class="descibtion-member">
							<h3>Tran Huu Khuong</h3>
							<h4>MSV: 3119410204</h4>
							<p>huukhuong.it@gmail.com</p>
						</div>
						<div class="info-member">
							<a href="https://www.facebook.com/JB.TranHuuKhuong/" class="mem-fb-link">
								<i class="fab fa-facebook-f mem-fb-icon"></i>
							</a>
							<a href="https://zalo.me/0786506577" class="mem-zalo-link"><img src="./img/content/link-icon/zalo-seeklogo.com.svg" alt="" class="mem-zalo-icon"></a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-12 mx-auto">
					<div class="card-member">
						<span>3</span>
						<div class="img-member">
							<img src="./img/3KSTeam/Kiet.png" alt="" class="img-member--img">
						</div>
						<div class="descibtion-member">
							<h3>Vo Hoang Kiet</h3>
							<h4>MSV: 3119410215</h4>
							<p>vohoangkiet.stt43@gmail.com</p>
						</div>
						<div class="info-member">
							<a href="https://www.facebook.com/thekids.1002" class="mem-fb-link">
								<i class="fab fa-facebook-f mem-fb-icon"></i>
							</a>
							<a href="https://zalo.me/0396527908" class="mem-zalo-link"><img src="./img/content/link-icon/zalo-seeklogo.com.svg" alt="" class="mem-zalo-icon"></a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-12 mx-auto">
					<div class="card-member">
						<span>4</span>
						<div class="img-member">
							<img src="./img/3KSTeam/Khang.png" alt="" class="img-member--img">
						</div>
						<div class="descibtion-member">
							<h3>Ngo Phu Khang</h3>
							<h4>MSV: 3119410180</h4>
							<p>ngophukhang2001@gmail.com</p>
						</div>
						<div class="info-member">
							<a href="https://www.facebook.com/ngokhang2001sgunkey" class="mem-fb-link">
								<i class="fab fa-facebook-f mem-fb-icon"></i>
							</a>
							<a href="https://zalo.me/0948214801" class="mem-zalo-link"><img src="./img/content/link-icon/zalo-seeklogo.com.svg" alt="" class="mem-zalo-icon"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<!-- END CONTACT -->