<?php 
include_once "../_head.php";
if($_GET['cate']){
	$cate_idx = $_GET['cate'];
}
?>
	<div id="visaul" class=" s4"></div>
	<div id="content" class="s4s1" style="padding-top:0;">
		<div class="conts">
			<form type="text" method="get" name="searchForm" id="searchForm" onsubmit="return searchSubmit()">
				<div class="search_bar">
					<ul>
						<li class="<?=$_GET['cate']=='' ? 'active' : ''; ?>"><a href="/bbs/list.php">ALL</a></li>
						<?
							$cate_arr = cate_load();
							foreach($cate_arr as $key=>$v){
						?>
						<li class="<?=$_GET['cate']==$v['cate'] ? 'active' : ''; ?>"><a href="/bbs/list.php?cate=<?=$v['cate']?>"><?=$v['c_name']?></a></li>
						<?
							}
						?>
					</ul>
					<button type="button" class="bt_srh"><i>찾기</i></button>
					<div class="pop_srh">
						<div class="inner">
							<div>
								<label for="inp_01" class="inp_label">Search News</label>
								<input type="text" id="inp_01" value="" name="skey" id="skey" />
							</div>
							<button class="bt_close"><i>닫기</i></button>
						</div>
					</div>
				</div>
			</form>
			<section>
				<div class="in_conts">
					<div class="w_bt_right">
						<a href="/bbs/write_news.php" class="bt_1s">Write</a>
					</div>
					<table class="board_list">
						<caption>list 페이지</caption>
						<colgroup>
							<col width="" />
						</colgroup>
						<tbody>
							<?
								$b_array = board_list($page, $_GET['cate'], $_GET['skey']);
								$b_cnt = count($b_array);
								for($i=0;$i<$b_cnt;$i++){
									//a tag
									$b_link = "/bbs/view.php?idx=".$b_array[$i]['idx'];
									$b_title = $b_array[$i]['title'];
									$b_cate = $b_array[$i]['category'];
									//date format
									$dt_date = strtotime($b_array[$i]['dt_date']);
									$b_date = date("M d, Y", $dt_date);
							?>
							<tr>
								<td>
									<a href="<?=$b_link?>">
										<h3><?=$b_title?></h3>
										<div>
											<span><?=$b_date?></span><span><?=$b_cate?></span>
										</div>
									</a>
								</td>
							</tr>
							<?
								}
							?>
						</tbody>
					</table>
					<div class="paging">						
						<?=pagination($page, $_GET['cate'], $_GET['skey']);?>
					</div>
				</div>
			</section>
		</div>
	</div>
<?php include_once "../_tail.php";?>