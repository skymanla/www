<?php
/*
function 및 common 변수 선언
180423 skymanla
 */
error_reporting(E_ALL);

ini_set("display_errors", 0);

//현재 안쓰이는 변수들 초기화
$w_a_num = 0;
$w_b_num = 0;
$w_c_num = 0;
$method = $_SERVER['REQUEST_METHOD'];
$q_uri = $_SERVER['REQUEST_URI'];

if($_GET["page"] == 0){
	$page = 1;
}else{
	$page = $_GET["page"];
}

//$db = mysqli_connect("localhost", "medpacto1", "medpacto!1", "medpacto1");
try{
	$db = new PDO("mysql:host=localhost;dbname=medpacto1", "medpacto1", "medpacto!1");
}catch(PDOException $e){
	echo 'Connect failed : '.$e->getMessage().'';
	return false;
}

function errmsg(){
	$r = "<script>alert('잘못된 접근입니다.');history.back();</script>";
	return $r;
}
function auth($auth){
	//test
	$auth = "14.32.121.97";
	if($_SERVER["REMOTE_ADDR"] == $auth){
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}

function cate_load(){
	global $db;
	$result = array();
	$i = 0;
	$sql = "select * from A_Category where C_Name <> '' order by C_Cate asc";
	$sql_result = $db->query($sql) or die($db->errorInfo());
	while($row = $sql_result->fetch()){
		$result[$i]['cate'] = $row['C_Cate'];
		$result[$i]['c_name'] = $row['C_Name'];
		$i++;
	}
	return $result;
}

function write_news($t, $cont, $cate, $date, $ip){
	global $db;
	$result = "";
	//idx 생성
	$sql = "select B_Idx from A_Board where B_Idx <> '' order by B_Idx desc limit 1";
	$q = $db->query($sql) or die($db->errorInfo());
	$v = $q->fetch();
	$v['B_Idx'];
	if($v['B_Idx']){
		$idx = ++$v['B_Idx'];
	}else{
		$idx = 1;
	}
	$sql = "insert into 
			(B_Idx, B_Num, B_Title, B_Content, B_Id, B_Ip, B_Dt_date, B_Cate) 
			values 
			('".$idx."', '".$idx."', '".$t."', '".$cont."', '".$ip."', '".$date."', '".$cate."')";
	$ins_data = ["idx"=>$idx,
					"nidx"=>$idx,
					"title"=>$t,
					"content"=>$cont,
					"id"=>"admin",
					"cate"=>$cate];
	$sql = $db->prepare("insert into A_Board (B_Idx, B_Num, B_Title, B_Content, B_Id, B_Ip, B_Dt_date, B_cate) 
						values (:idx, :nidx, :title, :content, :id, '$ip', '$date', :cate)");
	if($sql->execute($ins_data)){
		//file uploader
		if($_FILES['upFile']["size"] > 0){
			fileuploader($idx);
		}
		$result = true;
	}else{
		//$debug = debug_backtrace();
		$debug = $sql->errorCode();
		print_r($debug);
		die;
	}

	return $result;
}

function modify_save($idx, $t, $cont, $cate, $date, $ip){
	global $db;
	$sql = "update A_Board set B_Title='$t', B_Content='$cont', B_Cate='$cate', B_Mody_dt_date='$date'
			where B_Idx='$idx'";
	$q = $db->prepare($sql);
	if($q->execute()){
		//file uploader
		if($_FILES['upFile']["size"] > 0){
			fileuploader($idx);
		}
		$result = true;
	}else{
		//$debug = debug_backtrace();
		$debug = $sql->errorCode();
		print_r($debug);
		die;
	}

	return $result;
}
function fileuploader($idx){
	global $db;
	//print_r($_FILES);
	//echo $idx;
	
	$sql = "select count(*) as cnt from A_Board_file where B_Idx='".$idx."'";
	$r = $db->query($sql);
	$r = $r->fetch();
	if($r['cnt'] > 0){//있는경우
		$dt_date = date('Y-m-d', time());
		$ori_name = $_FILES['upFile']['name'];
		$renew_name = $idx."_".$dt_date;
		$size = $_FILES['upFile']['size'];
		$down_hit = 0;
		$ext = substr(strrchr($_FILES["upFile"]["name"],"."),1);
		$ext = strtolower($ext);

		$uploadPath = $_SERVER['DOCUMENT_ROOT']."/uploadata/bbs";
		
		$reject_ext = array(".exe",".c", ".php", ".jsp", ".java", ".html", ".css");
		if(in_array($ext, $reject_ext)){
			return "<script>alert('등록 불가능한 확장자가 있습니다.\n첨부파일 등록에 실패했습니다.');</script>";
		}else{
			if(move_uploaded_file($_FILES['upFile']['tmp_name'],$uploadPath."/".$renew_name)){
				$sql = "update A_Board_file set
						B_Re_file='$renew_name',
						B_Ori_file='$ori_name',
						B_Ext='$ext',
						B_Size='$size'
						where B_Idx='".$idx."'";
				$insert_file = $db->prepare($sql);
				if($insert_file->execute()){
					return true;
				}else{
					$debug = $insert_file->errorCode();
					print_r($debug);
					die;
				}
			}
		}
	}else{//없는경우 
		$dt_date = date('Y-m-d', time());
		$ori_name = $_FILES['upFile']['name'];
		$renew_name = $idx."_".$dt_date;
		$size = $_FILES['upFile']['size'];
		$down_hit = 0;
		$ext = substr(strrchr($_FILES["upFile"]["name"],"."),1);
		$ext = strtolower($ext);

		$uploadPath = $_SERVER['DOCUMENT_ROOT']."/uploadata/bbs";
		
		$reject_ext = array(".exe",".c", ".php", ".jsp", ".java", ".html", ".css");
		if(in_array($ext, $reject_ext)){
			return "<script>alert('등록 불가능한 확장자가 있습니다.\n첨부파일 등록에 실패했습니다.');</script>";
		}else{
			if(move_uploaded_file($_FILES['upFile']['tmp_name'],$uploadPath."/".$renew_name)){
				$sql = "insert into a_board_file (B_Idx, B_Num, B_Re_file, B_Ori_file, B_Ext, B_Size, B_Dt_date)
						values ('".$idx."', '".$idx."', '".$renew_name."', '".$ori_name."', '".$ext."', '".$size."', '".$dt_date."')";
				$insert_file = $db->prepare($sql);
				if($insert_file->execute()){
					return true;
				}else{
					$debug = $insert_file->errorCode();
					print_r($debug);
					die;
				}
			}
		}
	}
}

function newlist($cnt){
	global $db;
	$r = array();
	$result = "";
	$sql = "select B_Idx, B_Title, B_Dt_date from A_Board order by B_Dt_date desc limit 1, $cnt";
	$q = $db->query($sql) or die($db->errorInfo());
	$i=0;
	while($row = $q->fetch()){
		$r[$i]['idx'] = $row['B_Idx'];
		$r[$i]['title'] = $row['B_Title'];
		$r[$i]['dt_date'] = date("M d, Y",strtotime($row['B_Dt_date']));
		$i++;
	}
	//print_r($r);
	return $r;
}

function board_list($page='', $cate='', $skey=''){
	global $db;
	$r = array();
	$result = "";
	$onePage = 5;
	$currentLimit = ($onePage * $page) - $onePage;
	$sqlLimt = 'limit '.$currentLimit.', '.$onePage;
	if($cate != ''){
		$catesql = " and B_Cate='".$cate."' ";
	}
	if($skey != ''){
		$skeysql = " and B_Title like '%".$skey."%' ";
	}
	$sql = "select * from A_Board where B_Idx <> '' ".$catesql.$skeysql." order by B_Idx desc ".$sqlLimt;
	//echo $sql;
	$q = $db->query($sql) or die($db->errorInfo());
	$i=0;
	while($row = $q->fetch()){
		$row['B_Content'] = stripslashes($row['B_Content']);
		$r[$i]['idx'] = $row['B_Idx'];
		$r[$i]['num'] = $row['B_Num'];
		$r[$i]['title'] = $row['B_Title'];
		$r[$i]['content'] = $row['B_Content'];
		$r[$i]['id'] = $row['B_Id'];
		$r[$i]['ip'] = $row['B_Ip'];
		$r[$i]['dt_date'] = $row['B_Dt_date'];
		$r[$i]['hit'] =$row['B_Hit'];
		$r[$i]['category'] = $row['B_Cate'];
		//카테고리 명 가져오자
		$sql = "select C_Name from A_Category where C_Idx='".$row['B_Cate']."'";
		$cq = $db->query($sql) or die($db->errorInfo());
		$cv = $cq->fetch();
		$r[$i]['category'] = $cv['C_Name'];
		$i++;
	}
	//print_r($r);
	return $r;
}

function pagination($page='', $cate='', $skey=''){
	//전체페이지 수
	global $db;
	if($cate != ''){
		$catesql = " and B_Cate='".$cate."' ";
		$cateurl = '&cate='.$cate;
	}
	if($skey != ''){
		$skeysql = " and B_Title like '%".$skey."%' ";
		$skeyurl = '&skey='.$skey;
	}
	$sql = "select count(*) as cnt from A_Board where B_Idx <> '' ".$catesql.$skeysql;
	$cq = $db->query($sql) or die($db->errorInfo());
	$cv = $cq->fetch();
	$allPost  = $cv['cnt'];
	$onePage = 5;//한페이지에 보여줄 게시글 수
	$allPage = ceil($allPost / $onePage);//전체 페이지 수
	/*if($page < 1){
		echo  "<script>alert('존재하지 않는 페이지입니다.');history.back();</script>";
		exit;
	}*/
	$oneSection = 5;//한번에 보여줄 페이지 수1~5 6~10.....
	$currentSection = ceil($page / $oneSection);//현재 섹션	
	$allSection = ceil($allPage / $oneSection);//전체 섹션 수

	$firstPage = ($currentSection * $oneSection) - ($oneSection-1);//현재 섹션 처음 페이지
	if($currentSection == $allSection) {
		$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
	} else {
		$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
	}
	$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지
	$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지

	if($prevPage == false){
		$paging = "<a href='javascript:void(0);'>PREV</a><ul>";
	}else{
		$paging = "<a href='./list.php?page=$prevPage".$cateurl.$skeyurl."'>PREV</a><ul>";
	}
	for($i=$firstPage;$i<=$lastPage;$i++){
		if($i == $page){
			$paging .= '<li class="active"><a href="javascript:void(0)">'.$i.'</a></li>';
		}else{
			$paging .= '<li><a href="./list.php?page='.$i.$cateurl.$skeyurl.'">'.$i.'</a></li>';
		}
	}
	if($allPage >= $nextPage){
		$paging .= "</ul><a href='./list.php?page=$nextPage".$cateurl.$skeyurl."'>NEXT</a>";
	}else{
		$paging .= "</ul><a href='javascript:void(0);'>NEXT</a>";
	}
	

	return $paging;
}

function bbs_view($idx){
	global $db;
	$sql = "select * from A_Board where B_Idx='".$idx."'";
	$q = $db->query($sql);
	$r = array();
	while($row = $q->fetch()){
		$r['title'] = stripslashes($row['B_Title']);
		$r['contents'] =stripslashes($row['B_Content']);
		$r['dt_date'] = date("M d, Y",strtotime($row['B_Dt_date']));
		$r['hit'] = $row['B_Hit'];
		//get category
		$sql = "select C_Name from A_Category where C_Idx='".$row['B_Cate']."'";
		$cq = $db->query($sql) or die($db->errorInfo());
		$cv = $cq->fetch();
		$r['category'] = $cv['C_Name'];
		//get file
		$sql = "select B_Ori_file from a_board_file where B_Idx='".$idx."'";
		if($fq = $db->query($sql)){
			$fv = $fq->fetch();
			$r['file_name'] = $fv['B_Ori_file'];
		}else{
			$r['file_name'] = "";	
		}
	}

	$sql = "select B_Idx, B_Title from A_Board where B_Idx > '".$idx."' order by B_Idx asc limit 1";
	$up_q = $db->query($sql);
	$up_v = $up_q->fetch();
	$r['up_idx'] = $up_v['B_Idx'];
	$r['up_title'] = $up_v['B_Title'];

	$sql = "select B_Idx, B_Title from A_Board where B_Idx < '".$idx."' order by B_Idx desc limit 1";
	$down_q = $db->query($sql);
	$down_v = $down_q->fetch();
	$r['down_idx'] = $down_v['B_Idx'];
	$r['down_title'] = $down_v['B_Title'];



	return $r;
}

function hitup($idx){
	global $db;
	$sql = "update A_Board set B_Hit=B_Hit+1 where B_Idx='".$idx."'";
	$q = $db->prepare($sql);
	if($q->execute()){
		 $result = true;
	}else{
		//$debug = debug_backtrace();
		$debug = $sql->errorCode();
		print_r($debug);
		die;
	}

	return $result;
}
?>