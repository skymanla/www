$(function(){
	//subScrollHead();//scroll될때 header 높낮이 제어;
	popSearch();//new카테고리에서 search눌럿을때;
	inpLabel();//placeholder 대체
	//tabList('search_bar');
});

function subScrollHead() {
	$(window).on('scroll',function(){
		var scrollY = $(this).scrollTop();
		if (scrollY > 50) {
			$('#header').addClass('scroll');
			$('#container').addClass('scroll');
		} else {
			$('#header').removeClass('scroll');
			$('#container').removeClass('scroll');
		}
	});
}

function tabList(t){
	$('.'+t+' ul > li > a').on('click',function(){
		$(this).parent().addClass('active').siblings().removeClass('active');
		return false;
	});
}

function popSearch(){
	$('.bt_srh').on('click',function(){
		$(this).next().stop().fadeIn(300);
	});
	$('.bt_close').on('click',function(){
		$(this).closest('.pop_srh').stop().fadeOut(300);
	});
}

function inpLabel(){
	$('.pop_srh input:text').on({
		'focusin' : function(){
			$(this).prev().addClass('active');
		},
		'focusout' : function(){
			if($(this).val()=='') $(this).prev().removeClass('active');
		}
	});
}

