<?
header("Content-Type:application/json");

include_once($_SERVER['DOCUMENT_ROOT']."/common/lib.php");
$idx = $_REQUEST['pidx'];

$sql = "delete from A_Board_file where B_Idx='".$idx."'";
if($db->query($sql)){
	$result = true;
}else{
	$result = false;
}

echo json_encode($result);
?>