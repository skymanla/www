	<header id="header" <?php if($w_a_num===0 || $w_a_num===1 || $w_a_num===2 || $w_a_num===3){ echo 'class="on"'; } ?>>
		<div class="in_logo">
			<h1><a href="/">MedPacto</a></h1>
		</div>
		<div class="gnb">
			<ul <?php if($w_a_num===0 || $w_a_num===1 || $w_a_num===2 || $w_a_num===3){ echo 'class="on hover"'; } ?>>
				<li <?php if($w_a_num===0){ echo 'class="hover"'; } ?>>
					<a href="/page/s1/s1.php" class="menu">MedPacto</a>
					<div>
						<ul>
							<li <?php if($w_a_num==0 && $w_b_num==0){ echo 'class="on"'; } ?>><a href="/page/s1/s1.php">About</a></li>
							<li <?php if($w_a_num==0 && $w_b_num==1){ echo 'class="on"'; } ?>><a href="/page/s1/s2.php">Vision</a></li>
							<li <?php if($w_a_num==0 && $w_b_num==2){ echo 'class="on"'; } ?>><a href="/page/s1/s3.php">CI</a></li>
							<li <?php if($w_a_num==0 && $w_b_num==3){ echo 'class="on"'; } ?>><a href="/page/s1/s4.php">Contact Us</a></li>
						</ul>
					</div>
				</li>
				<li <?php if($w_a_num===1){ echo 'class="hover"'; } ?>>
					<a href="/page/s2/s1.php" class="menu">R&D</a>
					<div>
						<ul>
							<li <?php if($w_a_num==1 && $w_b_num==0){ echo 'class="on"'; } ?>><a href="/page/s2/s1.php">Pipeline</a></li>
							<li <?php if($w_a_num==1 && $w_b_num==1){ echo 'class="on"'; } ?>><a href="/page/s2/s2.php">Vactosertib</a></li>
						</ul>
					</div>
				</li>
				<li <?php if($w_a_num===2){ echo 'class="hover"'; } ?>>
					<a href="/page/s3/s1.php" class="menu">Collaboration</a>
					<div>
						<ul>
							<li <?php if($w_a_num==2 && $w_b_num==0){ echo 'class="on"'; } ?>><a href="/page/s3/s1.php">Partnering Strategy</a></li>
							<li <?php if($w_a_num==2 && $w_b_num==1){ echo 'class="on"'; } ?>><a href="/page/s3/s2.php">Strategic Collaborations</a></li>
						</ul>
					</div>
				</li>
				<li <?php if($w_a_num===3){ echo 'class="hover"'; } ?>>
					<a href="/page/s4/s1.php" class="menu">News</a>
					<div>
						<ul>
							<li <?php if($w_a_num==3 && $w_b_num==0){ echo 'class="on"'; } ?>><a href="/page/s4/s1.php">News</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</header>