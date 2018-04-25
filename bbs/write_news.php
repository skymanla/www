<?php 
include_once "../_head.php";
//auth checking
$aidx = $_SERVER["REMOTE_ADDR"];
if(auth($aidx) == true){
	echo "<script>alert('허용되지 않은 접속입니다.');history.back();</script>";
}

switch($method){
	case 'GET':
		include_once "../page/s4/s1swrite.php";
		include_once "../_tail.php";
		break;
	case 'POST':
		//post 변수 정렬
		$title = addslashes($_POST['title']);
		$contents = addslashes($_POST['editor1']);
		$cate = $_POST['cate'];
		$dt_date = date("Y-m-d H:i:s", time());
		$write_ip = $_SERVER['REMOTE_ADDR'];
		$write_save = write_news($title, $contents, $cate, $dt_date, $write_ip);
		if($write_save == true){
			echo "<script>alert('글이 등록되었습니다.');location.replace('/page/s4/s1');</script>";
		}
		break;
	default:
		break;

}
?>