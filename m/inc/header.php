<header id="header" <?php if($w_a_num===0 || $w_a_num===1 || $w_a_num===2 || $w_a_num===3){ echo 'class="on"'; } ?>>
	<h1><a href="/m/" role="banner"><i>logo</i></a></h1>
	<button type="button" class="bt_menu">메뉴</button>
</header>
<nav id="gnb" role="navigation">
	<div class="mask">
		<div class="conts">
			<ul>
				<li <?php if($w_a_num==0){ echo 'class="on"'; } ?>>
					<a href="javascript:void(0);">MedPacto</a>
					<ul>
						<li <?php if($w_a_num==0 && $w_b_num==0){ echo 'class="on"'; } ?>><a href="/m/page/s1/s1.php">About</a></li>
						<li <?php if($w_a_num==0 && $w_b_num==1){ echo 'class="on"'; } ?>><a href="/m/page/s1/s2.php">Vision</a></li>
						<li <?php if($w_a_num==0 && $w_b_num==2){ echo 'class="on"'; } ?>><a href="/m/page/s1/s3.php">Ci</a></li>
						<li <?php if($w_a_num==0 && $w_b_num==3){ echo 'class="on"'; } ?>><a href="/m/page/s1/s4.php">Contact Us</a></li>
					</ul>
				</li>
				<li <?php if($w_a_num===1){ echo 'class="on"'; } ?>>
					<a href="javascript:void(0);">R&D</a>
					<ul>
						<li <?php if($w_a_num==1 && $w_b_num==0){ echo 'class="on"'; } ?>><a href="/m/page/s2/s1.php">Pipeline</a></li>
						<li <?php if($w_a_num==1 && $w_b_num==1){ echo 'class="on"'; } ?>><a href="/m/page/s2/s2.php">Vactosertib</a></li>
					</ul>
				</li>
				<li <?php if($w_a_num===2){ echo 'class="on"'; } ?>>
					<a href="javascript:void(0);">Collaboration</a>
					<ul>
						<li <?php if($w_a_num==2 && $w_b_num==0){ echo 'class="on"'; } ?>><a href="/m/page/s3/s1.php">Partnering Strategy</a></li>
						<li <?php if($w_a_num==2 && $w_b_num==1){ echo 'class="on"'; } ?>><a href="/m/page/s3/s2.php">Strategic Collaborations</a></li>
					</ul>
				</li>
				<li <?php if($w_a_num===3){ echo 'class="on"'; } ?>>
					<a href="javascript:void(0);">News</a>
					<ul>
						<li <?php if($w_a_num==3 && $w_b_num==0){ echo 'class="on"'; } ?>><a href="/m/page/s4/s1.php">News</a></li>
					</ul>
				</li>
			</ul>
			<button type="button" class="bt_close"><i>닫기</i></button>
		</div>
	</div>
</nav>