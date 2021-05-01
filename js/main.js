$(document).ready(function () {

	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 2,
				nav: false
			},
			1000: {
				items: 3,
				nav: true,
				loop: false
			}
		}
	})

	$("#search-btn").click(function () {
		$("#search-box").toggleClass("active");
	});

	$(window).scroll(function () {
		var Scroll = $(window).scrollTop();

		if (Scroll > 0) {
			$(".navbar ").addClass("sticky");
		} else {
			$(".navbar ").removeClass("sticky");
		}

	});


	// Làm hiệu ứng mượt khi scroll
	$("a").on('click', function (event) {
		if (this.hash !== "") {
			event.preventDefault();
			var hash = this.hash;
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 800, function () {
				window.location.hash = hash;
			});
		}
	});



});

function showProductDetail(maSP) {
	$.ajax({
		url: "./service/product-detail.php",
		method: "POST",
		data: {
			maSP: maSP
		},
		success: function (data) {
			$('#maSP').val(data[1]['maSP']);
			$('#detail-img').attr("src", data[1]['hinhAnh']);
			$('#detail-title').text(data[1]['tenSP']);
			$('#detail-description').text(data[1]['moTaSanPham']);
			var x = parseInt(data[1]['donGia']);
			x = x.toLocaleString('it-IT', { style: 'currency', currency: 'VND' });
			$('#price-total').text(x);
			$('#quantity').val(1);

			$('#detailModal').modal('show');
		}
	});
}


function themVaoGio() {
	if (login) {
		window.location.href = "./service/cart-service.php?maSP=" + $('#maSP').val() + "&soLuong=" + $('#quantity').val();
		return;
	}
	else {
		alert("Bạn phải đăng nhập mới có thể mua hàng!");
		return;
	}
}