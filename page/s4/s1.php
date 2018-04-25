<?php include_once "../../_head.php";?>
	<div id="visaul" class=" s4"></div>
	<div id="content" class="s4s1" style="padding-top:0;">
		<div class="conts">
			<div class="search_bar">
				<ul>
					<li class="active"><a href="javascript:void(0);">ALL</a></li>
					<li><a href="javascript:void(0);">PRESS RELEASES</a></li>
					<li><a href="javascript:void(0);">MILESTONES</a></li>
					<li><a href="javascript:void(0);">EVENTS</a></li>
				</ul>
				<button type="button" class="bt_srh"><i>찾기</i></button>
				<div class="pop_srh">
					<div class="inner">
						<div>
							<label for="inp_01" class="inp_label">Search News</label>
							<input type="text" id="inp_01" value="" name="" />
						</div>
						<button class="bt_close"><i>닫기</i></button>
					</div>
				</div>
			</div>
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
								$b_array = board_list($page);
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
								<td><a href="<?=$b_link?>"><h3><?=$b_title?></h3><div><span><?=$b_date?></span><span><?=$b_cate?></span>
								</td>
							</tr>
							<?
								}
							?>
						</tbody>
					</table>
					<div class="paging">						
						<?=pagination($page);?>
					</div>
				</div>
			</section>
		</div>
	</div>
<?php include_once "../../_tail.php";?>