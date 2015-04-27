<?php
echo json_encode($_FILES);

$target_dir     = "_gambar/galeri/o/";
$Thumb          = "_gambar/galeri/thumb/". basename($_FILES["filedata"]["name"]);
$Fit            = "_gambar/galeri/fit/". basename($_FILES["filedata"]["name"]);
$target_file    = $target_dir . basename($_FILES["filedata"]["name"]);
$upload         = move_uploaded_file($_FILES["filedata"]["tmp_name"], $target_file);

// Setelah berhasil di save, lalu di resize lah
include('src/abeautifulsite/SimpleImage.php');

try {
    $img = new abeautifulsite\SimpleImage($target_file);
    // Shrink the image proportionally to fit inside a box
    $img->best_fit(300, 200)->save($Fit);
    //$img->flip('x')->rotate(90)->best_fit(320, 200)->sepia()->save('example/result.gif');
    $img->thumbnail(80, 80)->save($Thumb);
    
} catch(Exception $e) {
    echo 'Error: ' . $e->getMessage();
}


//$target_dir_small = "_gambar/galeri/s/";
//$target_file_small = $target_dir_small . basename($_FILES["filedata"]["name"]["small"]);

//$target_dir_ori = "_gambar/galeri/o/";
//$target_file_ori = $target_dir_ori . basename($_FILES["filedata"]["name"]["original"]);
//$uploadOk = 1;
//
//$upload_small = move_uploaded_file($_FILES["filedata"]["tmp_name"]["small"], $target_file_small);

//$upload_ori = move_uploaded_file($_FILES["filedata"]["tmp_name"]["original"], $target_file_ori);
//
//echo "small: ".$upload_small ."- medium: ".$upload_medium."- ori: ".$upload_ori;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}
//// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
//// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
//// Check if $uploadOk is set to 0 by an error
//if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//} else {
//    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//    } else {
//        echo "Sorry, there was an error uploading your file.";
//    }
//}
?>