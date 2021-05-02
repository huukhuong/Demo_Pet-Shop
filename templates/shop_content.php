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

					</div>
				</div>

				<!-- CATEGORY -->
				<div class="col-lg-3 col-12">
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
											<a href="javascript: filterCategory(1, <?php echo $row['MaLoai'] ?>)" class="categories-item-link">
												<?php
												echo $row['TenLoai'];
												?>
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
				<div class="col-lg-9 col-12">
					<div class="shop-sort">
						<form action="" method="get" accept-charset="utf-8" class="row">
								<div class="form-group mx-2 mt-2">
									<label>Tên: </label>
									<span class="cr-select">
										<select id="select-filter-name" onchange="filterByName();">
											<option value="0">Chọn</option>
											<option value="1">từ A - Z</option>
											<option value="2">từ Z - A</option>
										</select>
									</span>
								</div>
								<div class="form-group mx-2 mt-2">
									<label>Giá:</label>
									<span class="cr-select">
										<select id="select-filter-price" onchange="filterByPrice();">
											<option value="0">Chọn khoảng</option>
											<option value="1">Thấp tới cao</option>
											<option value="2">Cao tới thấp</option>
										</select>
									</span>
								</div>
						</form>
					</div>

					<div id="product-pagination"></div>
					<!-- Đổ database phân trang -->
				</div>
				<!-- END PRODUCT -->

			</div>
		</div>
	</div>
</main>

<script>
	var filterCate = false;
	var filterName = false;
	var filterPrice = false;
	var idCate = 0;
	var nameFilter = 0;
	var priceFilter = 0;

	loadData_pagination();

	function loadData_pagination(page) {
		filterCate = false;
		filterName = false;
		filterPrice = false;
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
		if (!filterCate && !filterName)
			loadData_pagination(page);
		else if (!filterName)
			filterCategory(page, idCate);
		else if (filterName)
			filterByName(page);
	});


	function filterCategory(page, id) {
		filterCate = true;
		idCate = id;
		$.ajax({
			url: "./service/filterCategory.php",
			method: "POST",
			data: {
				page: page,
				id: id
			},
			success: function(data) {
				$('#product-pagination').html(data);
			}
		});
	}

	function filterByName(page) {
		nameFilter = $('#select-filter-name').find(":selected").val();
		if (nameFilter == 0) {
			loadData_pagination(1);
			return;
		}
		$.ajax({
			url: "./service/filterName.php",
			method: "POST",
			data: {
				page: page,
				filter: nameFilter
			},
			success: function(data) {
				$('#product-pagination').html(data);
			}
		});
	}

	function filterByPrice(page) {
		priceFilter = $('#select-filter-price').find(":selected").val();
		if (priceFilter == 0) {
			loadData_pagination(1);
			return;
		}
		$.ajax({
			url: "./service/filterPrice.php",
			method: "POST",
			data: {
				page: page,
				filter: priceFilter
			},
			success: function(data) {
				$('#product-pagination').html(data);
			}
		});
	}
</script>