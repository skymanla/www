<?
if(!$_GET['idx']){
	die("잘못된 접근입니다.");
}
$idx = $_GET['idx'];
include_once($_SERVER['DOCUMENT_ROOT']."/common/lib.php");
$sql = "delete from A_Board where B_Idx='".$idx."'";
if($db->query($sql)){
	$sql = "delete from A_Board_file where B_Idx='".$idx."'";
	if($db->query($sql)){
		//pass
	}else{
		//pass
	}
}
echo '<script>alert("삭제가 되었습니다.\n삭제된 게시물은 복구가 불가능합니다.");location.replace("/bbs/list.php");</script>';
?>