<?php 
include_once "../_head.php";

if($_GET['idx'] == ""){
	die(errmsg());	
}

hitup($_GET['idx']);
//view function
$view = bbs_view($_GET['idx']);
?>
	<div id="visaul" class=" s4"></div>
	<div id="content">
		<div class="conts">
			<section>
				<div class="in_conts">
					<table class="board_list view">
						<caption>view페이지</caption>
						<colgroup>
							<col style="width:130px;" />
							<col style="*" />
						</colgroup>
						<thead>
							<tr>
								<th colspan="2">
									<h3><?=$view['title']?></h3>
									<div><span><?=$view['dt_date']?></span><span><?=$view['category']?></span><span>Hit <?=$view['hit']?></span></div>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="txt" colspan="2">
									<?=$view['contents']?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<strong>The attached file</strong>
									<a href="./download.php?idx=<?=$_GET['idx']?>"><?=$view['file_name']?></a>
								</td>
							</tr>
							<tr>
								<th class="txt_prev">Previous</th>
								<td><a href="/bbs/view.php?idx=<?=$view['down_idx']?>"><?=$view['down_title']?></a></td>
							</tr>							
							<tr>
								<th class="txt_next">Next</th>
								<td><a href="/bbs/view.php?idx=<?=$view['up_idx']?>"><?=$view['up_title']?></a></td>
							</tr>
						</tbody>
					</table>
					<div class="w_bt_center">
						<a href="/bbs/delete.php?idx=<?=$_GET['idx']?>" class="bt_2s">Delete</a>
						<a href="/bbs/modify.php?idx=<?=$_GET['idx']?>" class="bt_1s">Modify</a>
						<a href="/bbs/list.php" class="bt_1s">List</a>
					</div>
				</div>
			</section>
		</div>
	</div>
<?php 
include_once "../_tail.php";
?>