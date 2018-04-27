<?php 
include_once "../_head.php";

if($_GET['idx'] == ""){
	die(errmsg());	
}

hitup($_GET['idx']);
//view function
$view = bbs_view($_GET['idx']);
?>
<script src="../../ckeditor/ckeditor.js"></script>
	<div id="visaul" class=" s4"></div>
	<div id="content">
		<form name="orderForm" id="orderForm" method="post" enctype="multipart/form-data" action="/bbs/write_news.php" onsubmit="return formSubmit();">
		<input type="hidden" name="mode" id="mode" value="modify" />
		<input type="hidden" name="idx" id="idx" value="<?=$_GET['idx']?>" />
		<div class="conts">
			<section>
				<div class="in_conts">
					<table class="board_list write">
						<caption>modify 페이지</caption>
						<colgroup>
							<col style="width:130px;" />
							<col style="*" />
						</colgroup>
						<tbody>
							<tr>
								<th><label for="select_10">Type</label></th>
								<td>
									<select name="cate" id="select_10" style="width:240px;">
										<?
											$cate_arr = cate_load();
											foreach($cate_arr as $key=>$v){
										?>
										<option value="<?=$v['cate']?>"><?=$v['c_name']?></option>
										<?
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<th><label for="inp_10">Title</label></th>
								<td>
									<input type="text" id="inp_10" value="<?=$view['title']?>" name="title" />
								</td>
							</tr>
							<tr>
								<th><label for="inp_20">content</label></th>
								<td>
									<textarea name="editor1" id="inp_20" cols="30" rows="10" style="height:400px;"><?=$view['contents']?></textarea>
									<script type="text/javascript">
										CKEDITOR.replace("editor1",{
											filebrowserImageUploadUrl:'/bbs/upload_file?type=Image'
										});
									</script>
								</td>
							</tr>
							<tr>
								<th><label for="inp_30">attached file</label></th>
								<td>
									<input type="file" class="" value="" name="upFile" id="upFile" />
									<? if($view['file_name']){ ?>
									<span id="file_field"><?=$view['file_name']?><span onclick="del_file_ajax(<?=$_GET['idx']?>)">X</span></span>
									<? }else{ }//pass  ?>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="w_bt_center">
						<a href="/page/s4/s1.php" class="bt_1s">Cancel</a>
						<a href="javascript:void(0);" class="bt_2s"><input type="submit" value="Modify" style="border:0;outline:0;background: transparent" /></a>
					</div>
				</div>
			</section>
		</div>
		</form>
	</div>
	<script>
		function del_file_ajax(idx){
			if(confirm("첨부파일을 삭제하시겠습니까?")){
				$.ajax({
					url : '/bbs/delete_file_ajax.php',
					type: "post",
					data : {pidx:idx},
					success : function(data){
						if(data == true){
							$('#file_field').hide();
						}else if(data == false){
							alert("삭제에 문제가 생겼습니다./n다시 시도해주시기 바랍니다.");
						}
					}, error : function(request, status, error){
						console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
					}
				});
			}else{
				return false;
			}
			
		}
	</script>
<? include_once "../_tail.php"; ?>