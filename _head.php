<?php
include("common/lib.php");
//echo dbconn();
?>
<?php include_once "inc/page.php";?>
<!DOCTYPE html >
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Medpacto</title>
	<!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon/favicon1.ico" /> -->
	<link rel="stylesheet" href="/css/reset.css" />
	<link rel="stylesheet" href="/css/layout.css" />
	<link rel="stylesheet" href="/css/sub.css" />
	<link rel="stylesheet" href="/css/slick.css" />
	<script type="text/javascript" src="/js/jquery-1.12.4.min.js"></script>
	<!--[if lt IE 9]>
		<script src="/js/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">
	//<![CDATA[
		var a_num = "<?php echo $w_a_num;?>";
		var b_num =  "<?php echo $w_b_num;?>";
		var c_num =  "<?php echo $w_c_num;?>";
	//]]>
	</script>
</head>
<body>
<div id="wrap">
	<!-- <div class="intro"> -->
		<!-- <h1><img src="img/common/intro.png" alt="logo"></h1> -->
	<!-- </div> -->
	<?php include_once "inc/header.php";?>
	<div id="container">