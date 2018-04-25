$(function(){
	selectBox();//select box change
	fileLength()//view page file upload 갯수 체크
});
function selectBox() {
	$('#sel_box').on('change',function(){
		var selectTxt = $(this).find('option:selected').text();
		$(this).prev().text(selectTxt);
	});
}
function fileLength() {
	var countLength = $('.file_down > li').length;
	$('.file_count').text(countLength);
}