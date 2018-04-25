<?php include_once "../../_head.php";?>

<?php
//auth checking
$aidx = $_SERVER["REMOTE_ADDR"];
if(auth($aidx) == false){
	echo "<script>alert('허용되지 않은 접속입니다.');history.back();</script>";
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/lang/summernote-ko-KR.js"></script>

	<div id="visaul" class=" s4"></div>
	<div id="content">
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
									<select name="" id="select_10" style="width:240px;">
										<option value="">Search Engine Watch</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><label for="inp_10">Title</label></th>
								<td>
									<input type="text" id="inp_10" value="" name="" />
								</td>
							</tr>
							<tr>
								<th><label for="inp_20">content</label></th>
								<td>
									<div id="summernote"></div>
									<script>
								      $('#summernote').summernote({
								      	lang : 'ko-KR',
								        placeholder: '여기에 작성해 주세요',
								        tabsize: 2,
								        height: 100,
								         toolbar: [
										    ['style', ['bold', 'italic', 'underline']],
										    ['fontsize', ['fontsize']],
										    ['color', ['color']],
										    ['para', ['ul', 'ol', 'paragraph']],
										    ['height', ['height']],
										    ['picture']
										  ]
								      });
								    </script>
									<!-- <textarea name="" id="inp_20" cols="30" rows="10" style="height:400px;"></textarea>-->
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
						<a href="javascript:void(0);" class="bt_2s">Save</a>
					</div>
				</div>
			</section>
		</div>
	</div>
<?php include_once "../../_tail.php";?>