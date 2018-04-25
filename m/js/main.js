$(function(){
	introIn();//시작될떄 인트로 제어;
	scrollHead();
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
		if (scrollY > 50) {
			$('#header').addClass('on');
		} else {
			$('#header').removeClass('on');
		}
	});
}