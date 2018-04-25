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

if($_GET["page"]){
	$page = $_GET["page"];
}else{
	$page = 1;
}

//$db = mysqli_connect("localhost", "medpacto1", "medpacto!1", "medpacto1");
try{
	$db = new PDO("mysql:host=localhost;dbname=medpacto1", "medpacto1", "medpacto!1");
}catch(PDOException $e){
	echo 'Connect failed : '.$e->getMessage().'';
	return false;
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
	$result = "";
	$sql = "select * from A_Category where C_Name <> '' order by C_Cate asc";
	$sql_result = $db->query($sql) or die($db->errorInfo());
	while($row = $sql_result->fetch()){
		$result .= "<option value='".$row['C_Cate']."'>".$row['C_Name']."</option>";
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
		 $result = true;
	}else{
		//$debug = debug_backtrace();
		$debug = $sql->errorCode();
		print_r($debug);
		die;
	}

	return $result;
}

function newlist($cnt){
	global $db;
	$r = array();
	$result = "";
	$sql = "select * from A_Board order by B_Dt_date desc limit 1, $cnt";
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
		$i++;
	}
	//print_r($r);
	return $r;
}

function board_list($page){
	global $db;
	$r = array();
	$result = "";
	$onePage = 5;
	$currentLimit = ($onePage * $page) - $onePage;
	$sqlLimt = 'limit '.$currentLimit.', '.$onePage;
	$sql = "select * from A_Board order by B_Dt_date desc ".$sqlLimt;
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
		$i++;
	}
	//print_r($r);
	return $r;
}

function pagination($page){
	//전체페이지 수
	global $db;
	$sql = "select count(*) as cnt from A_Board";
	$cq = $db->query($sql) or die($db->errorInfo());
	$cv = $cq->fetch();
	$allPost  = $cv['cnt'];
	$onePage = 5;//한페이지에 보여줄 게시글 수
	$allPage = ceil($allPost / $onePage);//전체 페이지 수
	if($page < 1 || ($allPage && $page > $allPage)){
		echo  "<script>alert('존재하지 않는 페이지입니다.');history.back();</script>";
		exit;
	}
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

	$paging = "<a href='./s1.php?page=$prevPage'>PREV</a><ul>";
	for($i=$firstPage;$i<=$lastPage;$i++){
		if($i == $page){
			$paging .= '<li class="active">'.$i.'</li>';
		}else{
			$paging .= '<li><a href="./s1.php?page='.$i.'">'.$i.'</a></li>';
		}
	}
	$paging .= "</ul><a href='./s1.php?page=$nextPage'>NEXT</a>";

	return $paging;
}
?>