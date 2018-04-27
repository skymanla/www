<?
//downdload
if(!$_GET['idx']){
	die("잘못된 접근입니다.");
}
$idx = $_GET['idx'];
include_once($_SERVER['DOCUMENT_ROOT']."/common/lib.php");
$sql = "select * from A_Board_file where B_Idx='".$idx."'";
$q = $db->query($sql);
$v = $q->fetch();

$file_exist = $_SERVER['DOCUMENT_ROOT']."/uploadata/bbs/".$v['B_Re_file'];
$ori_name = $v['B_Ori_file'];

header('Content-Type: application/x-octetstream');
header('Content-Length: '.filesize($file_exist));
header('Content-Disposition: attachment; filename='.$ori_name);
header('Content-Transfer-Encoding: binary');

$fp = fopen($file_exist, "r");
fpassthru($fp);
fclose($fp);

?>