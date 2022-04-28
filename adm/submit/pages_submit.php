<?php
require_once('../include/connect.php');
require_once('../include/functions.php');
$Edit_id = '';
$temp    = '';
if (array_key_exists('edited_row_id', $_POST)) {
	$Edit_id = isset($_POST['edited_row_id']) ? $_POST['edited_row_id'] : '';
}
if (array_key_exists('temp', $_POST)) {
	$temp = isset($_POST['temp']) ? $_POST['temp'] : '';
}


$page_name = isset($_REQUEST['page_name']) ? $_REQUEST['page_name'] : '';
$pageHeader = isset($_POST['pageHeader']) ? $_POST['pageHeader'] : '';
$pageNote   = isset($_POST['pageNote']) ? $_POST['pageNote'] : '';



//var_dump(json_decode(file_get_contents("php://input"))); //and not $_POST['data']

//$json = file_get_contents('php://input');
//$data = json_decode($json);

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$request = explode('@@shm@@',$request);

//d($request);

$photo = explode('photo=',$request[0]);
$photo = $photo[1];
if($photo == 'undefined'){
	$photo = '';
}

$pageHeader = explode('pageHeader=',$request[1]);
$pageHeader = $pageHeader[1];

$page_name = explode('page_name=',$request[2]);
$page_name = $page_name[1];

$pageNote = explode('pageNote=',$request[3]);
$pageNote = $pageNote[1];

//d($photo);exit();
//$photo = isset($_POST['photo']) ? $_POST['photo'] : '';


//$photo = isset($request['photo']) ? $request['photo'] : '';
/*Create uploads directory if necessary*/
if(!file_exists('../../cdn')) mkdir('../../cdn');
if(!file_exists('../../cdn/pages')) mkdir('../../cdn/pages');
if(!file_exists('../../cdn/pages/thumbs')) mkdir('../../cdn/pages/thumbs');


$outputDirectoryMain = "../../cdn/pages/".$photo;
$outputDirectoryThumbs = "../../cdn/pages/thumbs/small".$photo;

$imageMain = 'temp/thumbs/'.$photo;
$imageThumbs = 'temp/thumbs/small'.$photo;


if ($page_name != '') {
	
	$sql_1 = "SELECT * FROM `web_pages` WHERE `page_name`='".escape($page_name)."'";
	$qry_1 = mysqli_query($db_connection,$sql_1);
	if(mysqli_num_rows($qry_1) == 0){
		$update = insert('web_pages', array(
			'page_name',
			'pageHeader',
			'pageNote'
		), array(
			$page_name,
			$pageHeader,
			$pageNote
		));
		if($photo != ''){
			$sql = "
            UPDATE `web_pages`
               SET `pageCoverPhoto`='".escape($photo)."'
             WHERE `page_name`='".escape($page_name)."'
            ";
			$update = mysqli_query($db_connection, $sql) or die("Error 37 -->" . mysqli_error($db_connection));
			rename($imageMain, $outputDirectoryMain);
			rename($imageThumbs, $outputDirectoryThumbs);
		}
	}else {
		$sql = "
        UPDATE `web_pages`
           SET `pageHeader`='".escape($pageHeader)."',
               `pageNote`='".escape($pageNote)."'
         WHERE `page_name`='".escape($page_name)."'
        ";
		$update = mysqli_query($db_connection, $sql) or die("Error 37 -->" . mysqli_error($db_connection));
		
		if($photo != ''){
			$sql = "
            UPDATE `web_pages`
               SET `pageCoverPhoto`='".escape($photo)."'
             WHERE `page_name`='".escape($page_name)."'
            ";
			$update = mysqli_query($db_connection, $sql) or die("Error 37 -->" . mysqli_error($db_connection));
			rename($imageMain, $outputDirectoryMain);
			rename($imageThumbs, $outputDirectoryThumbs);
		}
		
	}
	if ($update) {
		$arr['success'] = 2;
	}
} else {
	$arr['error'] = 0;
}
echo json_encode($arr);
?>