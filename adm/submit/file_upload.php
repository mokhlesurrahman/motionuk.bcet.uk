<?php
require_once('../include/functions.php');

if (!file_exists('temp')) {
    mkdir('temp');
}
if (!file_exists('temp/thumbs')) {
    mkdir('temp/thumbs');
}
if (isset($_FILES['file'])) {
    $upload_type = $_REQUEST['upload_type'];
    $image = $_FILES['file']['name'];
    $uploaded_file = $_FILES['file']['tmp_name'];
    $path = "temp/";
    $valid_formats = array("pdf", "PDF");
    $extension = getExtension($image);
    $uf = $upload_type.'_'.date('Ymd_His') . random_num(4) . '.' . $extension;;

    if (move_uploaded_file($uploaded_file, $path . $uf)) {
        ?>
        <script>
            $('#imgpreview_file').attr("src", 'img/upload_success.jpg');
        </script>
        <input type="hidden"
               name="file_name"
               id="file_name"
               value="<?php echo $uf; ?>"/>
        <?php
    } else {
        echo "Fail upload folder with read access.";
    }

}


?>