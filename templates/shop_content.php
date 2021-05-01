<link rel="stylesheet" type="text/css" href="./css/content.css">
<main class="mainshop">
	<div class="container">
		<div class="shop-content">
			<div class="row">
				<div class="col-12 pull-right">
					<div class="content-right">
						<div class="shop__title-top">
							<h2><span>Sự lựa chọn của mọi người</span>Giá tốt nhất ở 3KS</h2>
						</div>
						<div class="shop-sort">
							<span>Bộ lọc</span>
							<form action="" method="get" accept-charset="utf-8">
								<fieldset>
									<div class="form-group">
										<label>Sắp xếp: </label>
										<span class="cr-select">
											<select>
												<option>Tên: từ A-Z</option>
												<option>Tên: từ Z-A</option>
											</select>
										</span>
									</div>
									<div class="form-group">
										<label>Giá:</label>
										<span class="cr-select">
											<select>
												<option>Thấp tới cao</option>
												<option>Cao tới thấp</option>
											</select>
										</span>
									</div>
								</fieldset>

							</form>
						</div>
					</div>
				</div>

				<!-- CATEGORY -->
				<div class="col-3">
					<div class="content-left">
						<div class="shop-categories">
							<div class="shop-content-top">
								<h4>Danh mục</h4>
							</div>
							<ul class="categories-list">

								<?php
								include("./service/config.php");
								$sql = "SELECT * FROM Loai";
								$result = mysqli_query($conn, $sql);
								$num_row = mysqli_num_rows($result); // lấy ra số dòng truy vấn được
								if ($num_row > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
								?>
										<li class="categories-item">
											<a href="" class="categories-item-link">
												<?php echo $row['TenLoai']; ?>
											</a>
										</li>
								<?php
									}
								}
								?>

							</ul>
							<span class="view-all-products">
								<a href="./shop.php" class="categories-item-link">Tất cả</a>
							</span>
						</div>
						<div class="shop-widgetinstagram">
							<div class="shop-content-top">
								<h4>Instagram</h4>
							</div>
							<ul class="widgetinstagram-img-list">
								<li class="widgetinstagram-img-item">
									<figure>
										<img src="./img/instagram/img-01.jpg" alt="">
										<figcaption class="insta-caption-img">
											<a href="javascript:void(0);">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<em>12.254</em>
											</a>
										</figcaption>
									</figure>
								</li>
								<li class="widgetinstagram-img-item">
									<figure>
										<img src="./img/instagram/img-02.jpg" alt="">
										<figcaption class="insta-caption-img">
											<a href="javascript:void(0);">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<em>12.254</em>
											</a>
										</figcaption>
									</figure>
								</li>
								<li class="widgetinstagram-img-item">
									<figure>
										<img src="./img/instagram/img-03.jpg" alt="">
										<figcaption class="insta-caption-img">
											<a href="javascript:void(0);">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<em>12.254</em>
											</a>
										</figcaption>
									</figure>
								</li>
								<li class="widgetinstagram-img-item">
									<figure>
										<img src="./img/instagram/img-04.jpg" alt="">
										<figcaption class="insta-caption-img">
											<a href="javascript:void(0);">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<em>12.254</em>
											</a>
										</figcaption>
									</figure>
								</li>
								<li class="widgetinstagram-img-item">
									<figure>
										<img src="./img/instagram/img-05.jpg" alt="">
										<figcaption class="insta-caption-img">
											<a href="javascript:void(0);">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<em>12.254</em>
											</a>
										</figcaption>
									</figure>
								</li>
								<li class="widgetinstagram-img-item">
									<figure>
										<img src="./img/instagram/img-06.jpg" alt="">
										<figcaption class="insta-caption-img">
											<a href="javascript:void(0);">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<em>12.254</em>
											</a>
										</figcaption>
									</figure>
								</li>
								<li class="widgetinstagram-img-item">
									<figure>
										<img src="./img/instagram/img-07.jpg" alt="">
										<figcaption class="insta-caption-img">
											<a href="javascript:void(0);">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<em>12.254</em>
											</a>
										</figcaption>
									</figure>
								</li>
								<li class="widgetinstagram-img-item">
									<figure>
										<img src="./img/instagram/img-08.jpg" alt="">
										<figcaption class="insta-caption-img">
											<a href="javascript:void(0);">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<em>12.254</em>
											</a>
										</figcaption>
									</figure>
								</li>
								<li class="widgetinstagram-img-item">
									<figure>
										<img src="./img/instagram/img-09.jpg" alt="">
										<figcaption class="insta-caption-img">
											<a href="javascript:void(0);">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<em>12.254</em>
											</a>
										</figcaption>
									</figure>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- END CATEGORY -->


				<!-- PRODUCT -->
				<div class="col-9" id="product-pagination">
					<!-- Đổ database phân trang -->
				</div>
				<!-- END PRODUCT -->

			</div>
		</div>
	</div>
</main>

<script>
	$(document).ready(function() {
		loadData_pagination();

		function loadData_pagination(page) {
			$.ajax({
				url: "./service/pagination.php",
				method: "POST",
				data: {
					page: page
				},
				success: function(data) {
					$('#product-pagination').html(data);
				}
			});
		}

		$(document).on('click', '.page-link', function() {
			let page = $(this).attr("id");
			loadData_pagination(page);
		});


		

	});
</script>