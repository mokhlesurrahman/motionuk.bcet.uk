<?php
//if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');
function urlroute($url)
{
	global $htaccess;
	if (!$htaccess) {
		$url = 'index.php?view=' . $url;
	}
	return $url;
}

function d($items)
{
	echo '<pre>';
	print_r($items);
	echo '</pre>';
}

function escape($input)
{
	global $db_connection;
	if (get_magic_quotes_gpc()) {
		@$input = stripslashes($input);
	}
	return mysqli_real_escape_string($db_connection, trim($input));
}

function rollBack($msg)
{
	global $db_connection;
	mysqli_query($db_connection, "ROLLBACK");
	?>
	<div class="alert alert-dismissable alert-danger">
		<!--<strong>Oh snap!</strong> --><?php echo $msg; ?>
		<button type="button"
				class="close"
				data-dismiss="alert"
				aria-hidden="true">×
		</button>
	</div>
	<script type="text/javascript">
		$("#idsubmitData").show();
	</script>
	<?php
	die('');
}


function successMsg($msg, $pageLink)
{
	?>
	<div class="alert alert-dismissable alert-success">
		<!--<strong>Well done!</strong>--><?php echo $msg; ?>
		<button type="button"
				class="close"
				data-dismiss="alert"
				aria-hidden="true">×
		</button>
	</div>
	<script>
		$(".two_column").hide();
		$(".form-section").hide();
		$(".form-group").slideUp();
		
		$("#form_sample").get(0).setAttribute('action', ''); //this works
		
		$("#form_sample")[0].reset();
		//$("#form_sample").submit();
		setTimeout(function () {
			window.location = '<?php echo urlroute($pageLink);?>';
		}, 1000);
	</script>
	<?php
}

function notify($type, $message)
{
	?>

	<script>
		//$.notify("<?php echo $message ?>", "<?php echo $type; ?>");
        alert('<?php echo $message ?>');
	</script>

	<?php
}

function notify2($message,$type){
	echo '<script>';
	echo '$.notify("'.$message.'", "'.$type.'");';
	if($type == 'error'){
		echo '$.playSound("media/error.mp3");';
	}else{
		echo '$.playSound("media/correct.mp3");resetFormElements();$("#optionButton").trigger("click");';
	}
	echo '$("#idSubmitData").button("reset");';
	echo '</script>';
}

//converts $12312,12312.00 to mysqli format
function NumberConvertFromBDT($value)
{
	$value = preg_replace('/[\£,]/', '', $value);
	$value = floatval($value);
	return $value;
}

function dateConvert($date)
{
	@$req_date = explode("/", $date);
	return @$dt = "$req_date[2]-$req_date[1]-$req_date[0]";
}

function timeConvertTo24($time)
{
	$req_time = date("H:i:s", strtotime($time));;
	return $req_time;
}

function timeConvertToAmPm($time)
{
	$newTime = date('h:i A', strtotime($time));
	return $newTime;
}

function numFormat($num)
{
	return number_format((float)$num, '2', '.', '');
}

function name($email)
{
	global $db_connection;
	$sql = "SELECT usrFullName FROM tbl_admin WHERE usrEmail = '$email'";
	$qry = mysqli_query($db_connection, $sql) or die ("Error in name selection at header" . mysqli_error($db_connection));
	$rs = mysqli_fetch_array($qry);
	return $rs['usrFullName'];
}

function getExtension($str)
{
	$i = strrpos($str, ".");
	if (!$i) {
		return "";
	}
	$l = strlen($str) - $i;
	$ext = substr($str, $i + 1, $l);
	return $ext;
}

function random_num($n)
{
	//$uniqid = uniqid(php_uname($_SESSION['com_quantamsoftware_glamorousstorebd_com_admin_session_id']), true);
	return substr(number_format(time() * rand(), 0, '', ''), 0, $n);
	//return substr(base_convert(md5($uniqid), 16, 10) , $n);
}

function company_info($variable)
{
	global $db_connection;
	$sql = mysqli_query($db_connection, "SELECT " . $variable . " FROM req_company ORDER BY iCompanyId DESC Limit 0,1") or die(mysqli_error($db_connection));
	if (mysqli_num_rows($sql) > 0) {
		$row = mysqli_fetch_array($sql);
		$val = $row[$variable];
	} else {
		$val = 'Error Occurred!!!';
	}
	return $val;
}

function tbl_data_conditional($data, $pk, $col, $tbl)
{
	global $db_connection;
	$sql = "SELECT $col FROM $tbl WHERE $pk='" . $data . "'";
	$qry = mysqli_query($db_connection, $sql) or die ("Error in $col selection at header" . mysqli_error($db_connection));
	$rs = mysqli_fetch_array($qry);
	return $rs[$col];
}

function rrmdir($dir)
{
	foreach (glob($dir . '/*') as $file) {
		if (is_dir($file))
			rrmdir($file); else unlink($file);
	}
	rmdir($dir);
}

function resize($path, $uf, $width, $height, $userfile_size, $userfile_type, $prefix, $img_width)
{
	/*--------resize image-----------*/
	$ext = getExtension($uf);
	$size = $img_width; // the imagewidth
	$filedir = 'temp/'; // the directory for the original image
	$thumbdir = 'temp/thumbs/'; // the directory for the resized image
	$userfile_name = str_replace(" ", "", $uf);
	$userfile_tmp = str_replace(" ", "", $uf);
	$prod_img = $filedir . $userfile_name;
	$prod_img_thumb = $thumbdir . $prefix . $userfile_name;
	$sizes = getimagesize($prod_img);
	$aspect_ratio = $sizes[1] / $sizes[0];
	if ($sizes[1] <= $size) {
		$new_width = $sizes[0];
		$new_height = $sizes[1];
	} else {
		$new_height = $size;
		$new_width = abs($new_height / $aspect_ratio);
	}
	$destimg = ImageCreateTrueColor($new_width, $new_height) or die('Problem In Creating image');
	switch ($ext) {
		case "jpg":
		case "jpeg":
		case "JPG":
		case "JPEG":
			$srcimg = ImageCreateFromJPEG($prod_img) or die('Problem In opening Source Image');
			break;
		case "PNG":
		case "png":
			$srcimg = imageCreateFromPng($prod_img) or die('Problem In opening Source Image');
			imagealphablending($destimg, false);
			$colorTransparent = imagecolorallocatealpha($destimg, 0, 0, 0, 0x7fff0000);
			imagefill($destimg, 0, 0, $colorTransparent);
			imagesavealpha($destimg, true);
			break;
		case "BMP":
		case "bmp":
			$srcimg = imageCreateFromBmp($prod_img) or die('Problem In opening Source Image');
			break;
		case "GIF":
		case "gif":
			$srcimg = imageCreateFromGif($prod_img) or die('Problem In opening Source Image');
			break;
		default:
			$srcimg = ImageCreateFromJPEG($prod_img) or die('Problem In opening Source Image');
	}
	if (function_exists('imagecopyresampled')) {
		imagecopyresampled($destimg, $srcimg, 0, 0, 0, 0, $new_width, $new_height, imagesX($srcimg), imagesY($srcimg)) or die('Problem In resizing');
	} else {
		Imagecopyresized($destimg, $srcimg, 0, 0, 0, 0, $new_width, $new_height, imagesX($srcimg), imagesY($srcimg)) or die('Problem In resizing');
	}
	// Saving an image
	switch (strtolower($ext)) {
		case "jpg":
		case "jpeg":
			ImageJPEG($destimg, $prod_img_thumb, 85) or die('Problem In saving');
			break;
		case "png":
			imagepng($destimg, $prod_img_thumb) or die('Problem In saving');
			break;
		case "bmp":
			imagewbmp($destimg, $prod_img_thumb) or die('Problem In saving');
			break;
		case "gif":
			imagegif($destimg, $prod_img_thumb) or die('Problem In saving');
			break;
		default:
			// if image format is unknown, and you whant save it as jpeg, maybe you should change file extension
			imagejpeg($destimg, $prod_img_thumb, 85) or die('Problem In saving');
	}
}

function resizeThumbs($path, $uf, $width, $height, $userfile_size, $userfile_type, $prefix, $ThumbSquareSize)
{
	/*--------resize image-----------*/
	$ext = getExtension($uf);
	$size = $ThumbSquareSize; // the imagewidth
	$filedir = 'temp/'; // the directory for the original image
	$thumbdir = 'temp/thumbs/'; // the directory for the resized image
	$userfile_name = str_replace(" ", "", $uf);
	$userfile_tmp = str_replace(" ", "", $uf);
	$prod_img = $filedir . $userfile_name;
	$prod_img_thumb = $thumbdir . $prefix . $userfile_name;
	/*$sizes = getimagesize($prod_img);
    $aspect_ratio = $sizes[1]/$sizes[0];
	
	if ($sizes[1] <= $size){
		$new_width = $sizes[0];
		$new_height = $sizes[1];
	}else{
		$new_height = $size;
		$new_width = abs($new_height/$aspect_ratio);
	}*/
	list($CurWidth, $CurHeight) = getimagesize($prod_img);
	if ($CurWidth > $CurHeight) {
		$y_offset = 0;
		$x_offset = ($CurWidth - $CurHeight) / 2;
		$square_size = $CurWidth - ($x_offset * 2);
	} else {
		$x_offset = 0;
		$y_offset = ($CurHeight - $CurWidth) / 2;
		$square_size = $CurHeight - ($y_offset * 2);
	}
	$destimg = ImageCreateTrueColor($ThumbSquareSize, $ThumbSquareSize) or die('Problem In Creating image');
	switch ($ext) {
		case "jpg":
		case "jpeg":
		case "JPG":
		case "JPEG":
			$srcimg = ImageCreateFromJPEG($prod_img) or die('Problem In opening Source Image');
			break;
		case "PNG":
		case "png":
			$srcimg = imageCreateFromPng($prod_img) or die('Problem In opening Source Image');
			imagealphablending($destimg, false);
			$colorTransparent = imagecolorallocatealpha($destimg, 0, 0, 0, 0x7fff0000);
			imagefill($destimg, 0, 0, $colorTransparent);
			imagesavealpha($destimg, true);
			break;
		case "BMP":
		case "bmp":
			$srcimg = imageCreateFromBmp($prod_img) or die('Problem In opening Source Image');
			break;
		case "GIF":
		case "gif":
			$srcimg = imageCreateFromGif($prod_img) or die('Problem In opening Source Image');
			break;
		default:
			$srcimg = ImageCreateFromJPEG($prod_img) or die('Problem In opening Source Image');
	}
	if (function_exists('imagecopyresampled')) {
		//imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,imagesX($srcimg),imagesY($srcimg))or die('Problem In resizing');
		imagecopyresampled($destimg, $srcimg, 0, 0, $x_offset, $y_offset, $size, $size, $square_size, $square_size) or die('Problem In resizing');
	} else {
		Imagecopyresized($destimg, $srcimg, 0, 0, $x_offset, $y_offset, $size, $size, $square_size, $square_size) or die('Problem In resizing');
	}
	// Saving an image
	switch (strtolower($ext)) {
		case "jpg":
		case "jpeg":
			ImageJPEG($destimg, $prod_img_thumb, 90) or die('Problem In saving');
			break;
		case "png":
			imagepng($destimg, $prod_img_thumb) or die('Problem In saving');
			break;
		case "bmp":
			imagewbmp($destimg, $prod_img_thumb) or die('Problem In saving');
			break;
		case "gif":
			imagegif($destimg, $prod_img_thumb) or die('Problem In saving');
			break;
		default:
			// if image format is unknown, and you whant save it as jpeg, maybe you should change file extension
			imagejpeg($destimg, $prod_img_thumb, 90) or die('Problem In saving');
	}
}

function insert($table, $fields, $values)
{
	global $db_connection;
	$buildSQL = array();
	foreach ($fields as $key => $field):
		$buildFields[] = "`" . $field . "`";
	endforeach;
	$buildValues = array();
	foreach ($values as $key => $field):
		$buildValues[] = "'" . escape($field) . "'";
	endforeach;
	$sql = 'INSERT INTO ' . $table . '(' . implode(',', $buildFields) . ') VALUES (' . implode(',', $buildValues) . ')';
	$qry = mysqli_query($db_connection, $sql) or die ("Error insert-->" . mysqli_error($db_connection));
	if ($qry) {
		return true;
	} else {
		return false;
	}
}

function update($table, $fields, $values, $where)
{
	global $db_connection;
	$buildSQL = array();
	foreach ($fields as $key => $field):
		$buildSQL[] = "`" . $fields[$key] . "`='" . escape($values[$key]) . "'";
	endforeach;
	$sql = 'UPDATE ' . $table . ' SET ' . implode(',', $buildSQL) . ' WHERE ' . $where;
	$qry = mysqli_query($db_connection, $sql) or die ("Error 22-->" . mysqli_error($db_connection));
	if ($qry) {
		return true;
	} else {
		return false;
	}
}

function countword($text, $n)
{
	$text = strip_tags($text);
	$text = trim(preg_replace("/\s+/", " ", $text));
	$word_array = explode(" ", $text);
	if (count($word_array) <= $n)
		return implode(" ", $word_array);
	else {
		$text = '';
		foreach ($word_array as $length => $word) {
			$text .= $word;
			if ($length == $n)
				break;
			else $text .= " ";
		}
	}
	return $text . "....";
}

function url_slug($str, $options = array())
{
	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => false,
	);
	// Merge options
	$options = array_merge($defaults, $options);
	$char_map = array(
		// Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
		'ß' => 'ss',
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
		'ÿ' => 'y',
		// Latin symbols
		'©' => '(c)',
		// Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
		// Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
		// Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',
		// Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
		// Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
		'Ž' => 'Z',
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z',
		// Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
		'Ż' => 'Z',
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',
		// Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);
	// Make custom replacements
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	// Transliterate characters to ASCII
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}
	// Replace non-alphanumeric characters with our delimiter
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	// Remove duplicate delimiters
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	// Truncate slug to max. characters
	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
	// Remove delimiter from ends
	$str = trim($str, $options['delimiter']);
	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

?>