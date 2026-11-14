<?php
include("../weadmin/lib/session.php");
	$urlSite="/php-smarty-sample/ckeditor/";
	// $urlSite="/ckeditor/";

if($_SESSION[$valSiteManage . 'core_session_id']>=1){

 //extensive suitability check before doing anything with the file...
    if (!isset($_FILES['upload']) || $_FILES['upload'] == "none" || empty($_FILES['upload']['name']))
    {
       $message = "No file uploaded.";
    }
    else if ($_FILES['upload']["size"] == 0)
    {
       $message = "The file is of zero length.";
    }
    else
    {
       $fileExt = strtolower(pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION));
       $allowedExts = array('jpg', 'jpeg', 'png', 'gif');
       if (!in_array($fileExt, $allowedExts)) {
          $message = "The image must be in either GIF , JPG or PNG format. Please upload a JPG or PNG instead.";
       }
       else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
       {
          $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
       }
       else {
          $message = "";
          $url = 'upload/files/'.time()."_".preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $_FILES['upload']['name']);
          $move = move_uploaded_file($_FILES['upload']['tmp_name'], $url);
          if(!$move)
          {
             $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
          }
          $url = $urlSite.$url;
       }
    }


	if($message != "")
	{
		$url = "";
	}

	$funcNum = $_GET['CKEditorFuncNum'] ;
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
}else{
	header("Location: ../");
	die();
}

?>
