$(function(){
	introIn();//시작될떄 인트로 제어;
	scrollHead();//scroll될때 header 높낮이 제어;
	slideSlicks();//section슬라이드
});
function introIn() {
	var speedIn = 1000;
	var speedOut = 600;
	$('.intro h1').delay(400).fadeIn(speedIn,function(){
		$(this).delay(700).fadeOut(speedOut);
	});
	$('.intro').delay(2300).fadeOut(speedOut);
}

function scrollHead() {
	$(window).on('scroll',function(){
		var scrollY = $(this).scrollTop();
		if (scrollY > 90) {
			$('#header').addClass('scroll');
		} else {
			$('#header').removeClass('scroll');
		}
	});
}

function slideSlicks(){
	var slickSlide = $('.single-item');
	slickSlide.slick({
		autoplay:true,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplaySpeed: 3000,
		infinite: true, //loop기능
		nextArrow: '.btn_next',
		prevArrow: '.btn_prev',
		dots: false,
		pauseOnHover: true,//hover했을때 멈추는 기능 해제
		draggable: false, //스와이프기능 해제
	});

	$('.slide_wrap > button').on({
		'mouseenter focusin' : function(){
			slickSlide.slick('slickPause');
		},
		'mouseleave focusout' : function(){
			slickSlide.slick('slickPlay');
		}
	})
}

