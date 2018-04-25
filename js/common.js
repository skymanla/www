$(function(){
	inOut();//gnb
	btTop()//top으로 가기 버튼;
});

var inOut = function (){
	var $header = $('#header'),
		 $btn = $('.gnb > ul > li');

	var headActive = function(t){
		if(t=='in'){
			$header.addClass('hover').find('.gnb > ul').addClass('hover');
		} else {
			$header.removeClass('hover').find('.gnb > ul').removeClass('hover');
		}
	}
	$btn.on('mouseenter focusin',function (){
		$('.gnb > ul > li').removeClass('hover').find('> div > ul').stop().hide(10);
		$(this).addClass('hover').siblings().removeClass('hover');
		$(this).find('> div > ul').stop().show(10);
		headActive('in');
	});
	//$btn.on('focusout',function(){
		//$(this).removeClass('hover').find('> div > ul').stop().hide(10);
	//});
	//$btn.on('mouseenter mouseleave',function(){
		//$(this).siblings().removeClass('hover').find('> div > ul').stop().hide(10);
	//});

	$btn.on('mouseleave focusout',function (){
		if(a_num!==''){
			$(this).removeClass('hover');
			$(this).find('> div > ul').stop().hide(10);
		}
		pageAc1();
	});

	$header.on('mouseleave focusout',function (){
		if(a_num===''){
			headActive('out');
		}
		$(this).find('.gnb > ul > li').removeClass('hover').find('> div > ul').stop().hide(10);
		pageAc1();
	});

	function pageAc1(){
		if(a_num!==''){
			$('.gnb > ul > li').eq(a_num).addClass('hover').find('> div > ul').stop().show(10);
		}
	}
	pageAc1();
}



function btTop(){
	$('.go_top button').on({
		'mouseenter focusin' : function(){
			$(this).addClass('on');
		},
		'mouseleave focusout' : function(){
			$(this).removeClass('on');
		}
	});
	$('.go_top button').on('click',function(e){
		e.preventDefault();
		$('html, body').stop().animate({scrollTop:0});
	})
}



