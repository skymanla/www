<?php
include("common/lib.php");
//echo dbconn();
?>
<!DOCTYPE html >
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Medpacto</title>
	<!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon/favicon1.ico" /> -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/layout.css" />
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/slick.css">
	<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
	<!--[if lt IE 9]>
		<script src="js/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">
	//<![CDATA[
		var a_num = "";
		var b_num =  "";
		var c_num =  "";
	//]]>
	</script>
</head>
<body>
<div id="wrap">
	<div class="intro">
		<h1><img src="img/common/intro.png" alt="logo"></h1>
	</div>
	<?php include_once "inc/header.php";?>
	<div id="visual">
		<h2>
			<div>
				<strong>Hope for Patients</strong>
				<span>Using NGS technology to identify targets.<br />
				Developing therapeutics that patients need.</span>
			</div>
		</h2>
	</div>
	<div id="content">
		<section class="section01" style="background-color:#f1f1f1;">
			<div class="inner"><img src="img/main/section01.jpg"></div>
		</section>
		<section class="section02">
			<div class="inner">
				<h2>R&D</h2>
				<ul>
					<li>
						<a href="/page/s2/s1.php">
							<div>
								<h3>Pipeline</h3>
								<p>Only first-in-class or best-in-class<br />
								in MedPacto R&D</p>
							</div>
						</a>
					</li>
					<li>
						<a href="/page/s2/s2.php">
							<div>
								<h3>Vactosertib</h3>
								<p>The best in class drug candidate<br />
								in clinical trial phase II</p>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</section>
		<section class="section03">
			<div class="inner">
				<h2>Recent News</h2>
				<div class="slide_wrap">
					<button type="button" class="btn_prev"><i>뒤로가기</i></button>
					<div class="single-item slides">
						<div class="item sd1">
							<a href="javascript:void(0);">
								<div>
									<p>5 advanced Google<br />
									AdWords features<br />
									to enhance your PPC</p>
									<span>Mar 14, 2018</span>
								</div>
							</a>
						</div>
						<div class="item sd2">
							<a href="javascript:void(0);">
								<div>
									<p>Social surpasses search<br />
									in travel advertising<br />
									for first time</p>
									<span>Mar 12, 2018</span>
								</div>
							</a>
						</div>
						<div class="item sd3">
							<a href="javascript:void(0);">
								<div>
									<p>Social surpasses search<br />
									in travel advertising<br />
									for first time</p>
									<span>Mar 12, 2018</span>
								</div>
							</a>
						</div>
						<div class="item sd4">
							<a href="javascript:void(0);">
								<div>
									<p>Everything you need to
									know about the
									Google Chrome
									ad blocker</p>
									<span>Feb 15, 2018</span>
								</div>
							</a>
						</div>
						<div class="item sd5">
							<a href="javascript:void(0);">
								<div>
									<p>5 advanced Google<br />
									AdWords features<br />
									to enhance your PPC</p>
									<span>Mar 14, 2018</span>
								</div>
							</a>
						</div>
						<div class="item sd6">
							<a href="javascript:void(0);">
								<div>
									<p>Social surpasses search<br />
									in travel advertising<br />
									for first time</p>
									<span>Mar 12, 2018</span>
								</div>
							</a>
						</div>
						<div class="item sd7">
							<a href="javascript:void(0);">
								<div>
									<p>Social surpasses search<br />
									in travel advertising<br />
									for first time</p>
									<span>Mar 12, 2018</span>
								</div>
							</a>
						</div>
					</div>
					<button type="button" class="btn_next"><i>앞으로가기</i></button>
				</div>
			</div>
		</section>
		<section class="section04">
			<!-- <div class="inner"> -->
				<!-- <ul> -->
					<!-- <li> -->
						<!-- <div class="grid1"> -->
							<!-- <a href="/medpacto/page/s1/s1.php" class="ban_01"> -->
								<!-- <h3>About MedPacto</h3> -->
								<!-- <div class="bt_wrap"> -->
									<!-- <button type="button" class="btn_type1"><span> explore</span></button> -->
								<!-- </div> -->
							<!-- </a> -->
						<!-- </div> -->
					<!-- </li> -->
					<!-- <li> -->
						<!-- <div class="grid2"> -->
							<!-- <a href="/medpacto/page/s3/s1.php" class="ban_02"> -->
								<!-- <h3>Partnering Strategy</h3> -->
								<!-- <div class="bt_wrap"> -->
									<!-- <button type="button"><span> explore</span></button> -->
								<!-- </div> -->
							<!-- </a> -->
						<!-- </div> -->
						<!-- <div class="grid2"> -->
							<!-- <a href="/medpacto/page/s1/s2.php" class="ban_03"> -->
								<!-- <h3>Vision</h3> -->
								<!-- <div class="bt_wrap"> -->
									<!-- <button type="button"><span>explore</span></button> -->
								<!-- </div> -->
							<!-- </a> -->
						<!-- </div> -->
					<!-- </li> -->
				<!-- </ul> -->
			<!-- </div> -->
		</section>
	</div>
	<?php include_once "inc/footer.php";?>
</div>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
</html>