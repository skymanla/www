<?

$w_http_host = $_SERVER['HTTP_HOST'];
$w_request_uri = $_SERVER['REQUEST_URI'];
$w_file_name = basename($_SERVER['PHP_SELF']);
$w_sub_name = explode('/',$w_request_uri);
$w_index = true;


if(isset($w_sub_name[2])){
	$w_index = false;
	$w_b_num = explode('.',$w_file_name);
	$w_b_num = explode('s',$w_b_num[0]);
	$w_c_num = $w_b_num[2];
	$w_b_num = $w_b_num[1];

	switch($w_sub_name[2]){
		case "s1" : 
			$w_a_num = 1; 
			$w_s_title_1="MedPacto";
			switch($w_b_num){
				case "1" : $w_s_title_2="About"; break;
				case "2" : $w_s_title_2="Vision"; break;
				case "3" : $w_s_title_2="CI"; break;
				case "4" : $w_s_title_2="Contact Us"; break;
			}
		break;
		case "s2" : 
			$w_a_num = 2; 
			$w_s_title_1="R&D";
			switch($w_b_num){
				case "1" : $w_s_title_2="Pipeline"; break;
				case "2" : $w_s_title_2="Vactosertib"; break;
			}
		break;
		case "s3" : 
			$w_a_num = 3; 
			$w_s_title_1="Collaboration";
			switch($w_b_num){
				case "1" : $w_s_title_2="Partnering Strategy"; break;
				case "2" : $w_s_title_2="Strategic Collaborations"; break;
			}
		break;
		case "s4" : 
			$w_a_num = 4; 
			$w_s_title_1="News";
			switch($w_b_num){
				case "1" : $w_s_title_2="News"; break;
			}
		break;
	}
	if($w_a_num){
		$w_a_num = $w_a_num-1;
	}
	$w_b_num = $w_b_num-1;
	if($w_c_num){
		$w_c_num = $w_c_num-1;
	}
}
?>