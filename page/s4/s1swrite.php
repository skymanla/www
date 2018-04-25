<script src="../../ckeditor/ckeditor.js"></script>
	<div id="visaul" class=" s4"></div>
	<div id="content">
		<form name="orderForm" id="orderForm" method="post" enctype="multipart/form_data" action="/bbs/write_news" onsubmit="return formSubmit();">
		<div class="conts">
			<section>
				<div class="in_conts">
					<table class="board_list write">
						<caption>write 페이지</caption>
						<colgroup>
							<col style="width:130px;" />
							<col style="*" />
						</colgroup>
						<tbody>
							<tr>
								<th><label for="select_10">Type</label></th>
								<td>
									<select name="cate" id="select_10" style="width:240px;">
										<?=cate_load(); ?>
									</select>
								</td>
							</tr>
							<tr>
								<th><label for="inp_10">Title</label></th>
								<td>
									<input type="text" id="inp_10" value="" name="title" />
								</td>
							</tr>
							<tr>
								<th><label for="inp_20">content</label></th>
								<td>
									<textarea name="editor1" id="inp_20" cols="30" rows="10" style="height:400px;"></textarea>
									<script type="text/javascript">
										CKEDITOR.replace("editor1",{
											filebrowserImageUploadUrl:'/bbs/upload_file?type=Image'
										});
									</script>
								</td>
							</tr>
							<tr>
								<th><label for="inp_30">attached file</label></th>
								<td><input type="file" class="" value="" name="" /></td>
							</tr>
						</tbody>
					</table>
					<div class="w_bt_center">
						<a href="/page/s4/s1.php" class="bt_1s">Cancel</a>
						<a href="javascript:void(0);" class="bt_2s"><input type="submit" value="Save" style="border:0;outline:0;background: transparent" /></a>
					</div>
				</div>
			</section>
		</div>
		</form>
	</div>