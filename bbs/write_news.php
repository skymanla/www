<?php 
include_once "../_head.php";
//auth checking
$aidx = $_SERVER["REMOTE_ADDR"];
if(auth($aidx) == true){
	echo "<script>alert('허용되지 않은 접속입니다.');history.back();</script>";
}
switch($method){
	case 'GET':
		include_once "../bbs/write.php";
		include_once "../_tail.php";
		break;
	case 'POST':
		//post 변수 정렬
		$title = addslashes($_POST['title']);
		$contents = addslashes($_POST['editor1']);
		$cate = $_POST['cate'];
		$dt_date = date("Y-m-d H:i:s", time());
		$write_ip = $_SERVER['REMOTE_ADDR'];
		$mode = $_POST['mode'];
		switch($mode){
			case "write":
				$write_save = write_news($title, $contents, $cate, $dt_date, $write_ip);
				if($write_save == true){
					echo "<script>alert('글이 등록되었습니다.');location.replace('/bbs/list.php');</script>";
				}
				break;
			case "modify":
				$idx = $_POST['idx'];
				$modify_save = modify_save($idx, $title, $contents, $cate, $dt_date, $write_ip);
				if($modify_save == true){
					echo "<script>alert('글이 수정되었습니다.');location.replace('/bbs/view.php?idx=$idx');</script>";	
				}
				break;
			default:
				break;
		}
		break;
	default:
		break;

}
?>