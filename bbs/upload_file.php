<?
if($_FILES["upload"]["size"] > 0){
	//폴더명 만들 타임라인
	$date_filedir = date("YmdHis");
	//확장자
	$ext = substr(strrchr($_FILES["upload"]["name"],"."),1);
	$ext = strtolower($ext);
	$savefilename = $date_filedir."_".str_replace(" ","_",$_FILES["upload"]["name"]);
	//폴더 권한주기(생성권한)
	$uploadpath = $_SERVER['DOCUMENT_ROOT']."/uploadata/bbs/editor";
	$uploadsrc = $_SERVER['HTTP_HOST']."/uploadata/bbs/editor/";
	
	$http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 's' : '') . '://';

	//파일업로드하는 부분
    if($ext=="jpg" or $ext=="jpeg" or $ext=="gif" or $ext=="png"){
        if(move_uploaded_file($_FILES['upload']['tmp_name'],$uploadpath."/".iconv("UTF-8","EUC-KR",$savefilename))){
            $uploadfile = $savefilename;
            echo "<script type='text/javascript'>alert('업로드성공: ".$savefilename."');</script>;";
        }
    }else{
        echo "<script type='text/javascript'>alert('jpg, jpeg, gif, png파일만 업로드가능합니다.');</script>;";
    }
}else{
	exit;
}

echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction({$_GET['CKEditorFuncNum']}, '".$http.$uploadsrc."$uploadfile');</script>;";
?>