<?php

require_once('../include/functions.php');



// Create uploads directory if necessary

if(!file_exists('temp')) mkdir('temp');

if(!file_exists('temp/thumbs')) mkdir('temp/thumbs');

if(isset($_FILES['image'])){

$image = $_FILES["image"]["name"];

$uploadedfile = $_FILES['image']['tmp_name'];

$userfile_size = $_FILES['image']['size'];

$userfile_type = $_FILES['image']['type'];



$image_width = 800;

$image_height = 600;



$thumb_image_height = $image_height / 5;

$thumb_image_width = $image_width / 5;



$ThumbSquareSize 		= 250; //Thumbnail will be 100x100



$path = "temp/";



$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");



$extension = getExtension($image);

$uf = date('Ymd').random_num(4).'.'.$extension;;//File name eg. 200507119.ext



if(in_array($extension,$valid_formats)){

	if(move_uploaded_file($uploadedfile, $path.$uf)){

		resize($path,$uf,$image_width,$image_height,$userfile_size,$userfile_type,'',$image_width);

			resizeThumbs($path,$uf,$image_width,$image_height,$userfile_size,$userfile_type,'small',$ThumbSquareSize);

	

		unlink($path.$uf);

		?>

		<script>

        $('#imgpreview').attr("src", 'submit/temp/thumbs/small<?php echo $uf;?>');



        </script>

        <input type="hidden" name="photo" id="photo" value="<?php echo $uf;?>" />

        <?php

	}else{

	  	echo "Fail upload folder with read access.";

	}

}else{

  	echo "Invalid file format..";

}

}









?>