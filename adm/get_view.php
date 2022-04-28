<?php
require_once ('include/connect.php');
require_once ('include/functions.php');


$table_name = isset($_REQUEST['table_name']) ? $_REQUEST['table_name'] : '';

$unique_id = isset($_REQUEST['unique_id']) ? $_REQUEST['unique_id'] : '';
$unique_row = isset($_REQUEST['unique_row']) ? $_REQUEST['unique_row'] : '';
$Editid = isset($_REQUEST['Editid']) ? $_REQUEST['Editid'] : '';
if ($Editid != '') {
	$sql = ("SELECT * FROM $table_name WHERE $unique_id= '" . $Editid . "'");
	$query = mysqli_query($db_connection,$sql);
	$rs_view = mysqli_fetch_array($query);
	echo json_encode($rs_view);
}
else {
$rs_view = array();
if ($table_name == 'dbt_slider') {
	
	$sql = ("SELECT `slider`.*,`sis`.`strSisterConcernName` FROM `dbt_slider` as `slider`,`dbt_sister_concern` as `sis`
	WHERE `slider`.`intSisterID` = `sis`.`intSisterID`
	ORDER BY `slider`.`intSliderID` DESC");
	$query = mysqli_query($db_connection,$sql);
	while ($obj = mysqli_fetch_array($query)) {
		$pk = $obj['intSliderID'];
		
		$photo = '<img src="../cdn/partner/'.$obj['photo'].'" width="100px"/>';
		$strSisterConcernName = $obj['strSisterConcernName'];
		$strSmallHeader = $obj['strSmallHeader'];
		$strTopHeader = $obj['strTopHeader'];
		$strDescription = $obj['strDescription'];
$strShortLink = $obj['strShortLink'];
		$editButton = '
		<a class="btn btn-info btn-xs btn-edit" id="btn-edit" href="javascript:void(0)" data-temp="Edit-' . $pk . '"><i class="fa fa-pencil"></i></a> 
		<button class="btn btn-danger btn-xs btn-delete-'.$pk.'" data-loading-text="<i class=\'fa fa-circle-o-notch fa-spin\'></i>" id="btn-delete" href="javascript:void(0)" data-temp="Delete-'.$pk.'"><i class="fa fa-trash"></i></button>';
		$rs_view[] = array(
			'intSliderID' => $pk,
			'strSisterConcernName' => $strSisterConcernName,
			'strSmallHeader' => $strSmallHeader,
			'strTopHeader' => $strTopHeader,
			'photo' => $photo,
			'strDescription' => $strDescription,'strShortLink' => $strShortLink,
			'editButton' => $editButton,
		);
	}
}
else {
	$sql = ("SELECT * FROM $table_name WHERE `$unique_id` > 0 ORDER BY $unique_id DESC");
	$query = mysqli_query($db_connection,$sql);
	$rs_view = mysqli_fetch_array($query);
}
echo json_encode(array(
	'data' => $rs_view
));
} 
?>