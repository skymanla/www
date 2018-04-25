$(function(){
	navi ();
	btTop()//top으로 가기 버튼;
});
function navi (){
	$('.bt_menu').on('click',function(){
		$('#gnb').addClass('active');
	});
	$('.bt_close').add('.mask').on('click',function(){
		$('#gnb').removeClass('active');
	})
	$('#gnb .mask .conts > ul > li > a').on('click',function(e){
		event.stopPropagation();
		$('#gnb .mask .conts > ul > li > ul').stop().slideUp();
		$(this).next().stop().slideDown();
	});
}
function btTop(){
	$('.go_top button').on('click',function(e){
		e.preventDefault();
		$('html, body').stop().animate({scrollTop:0});
	})
}