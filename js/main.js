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