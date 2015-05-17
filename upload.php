<?php
include_once './_include/db_function.php';
// Setelah berhasil di save, lalu di resize lah
include('src/abeautifulsite/SimpleImage.php');

$do = $_GET['do'];
$nama           = make_image_name($_FILES["filedata"]["name"]);
//echo $nama;


if ($do == 'profile'){
    // 1. Simpan dulu file original dari upload user, lokasi folder ori
    $Thumb         = "_gambar/user/". basename($nama);;
    $target_dir    = "_gambar/user/o/";
    $target_file   = $target_dir . basename($nama);
    // 2. Proses upload ke folder besar
    $upload        = move_uploaded_file($_FILES["filedata"]["tmp_name"], $target_file);
    print_r($target_file);
    // 3. Manipulasi replikasi dari folder _gambar/galeri/o/
    try {
        
        $img = new abeautifulsite\SimpleImage(URLSITUS.$target_file);
        // Shrink the image proportionally to fit inside a box
        $img->thumbnail(80, 80)->save($Thumb);

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
    
    //Update Database
    $user_id = (int) $_SESSION['user_id'];
    $sql = "UPDATE tb_user SET `user_foto`='{$nama}' WHERE  `user_id`={$user_id};";
    good_query($sql);
    
}
elseif ($do == 'trip') {
    //echo json_encode($_FILES);
    // 1. Simpan dulu file original dari upload user, lokasi folder ori
    $target_dir     = "_gambar/galeri/o/";
    // 2. Lokasi folder replikasi
    $Thumb          = "_gambar/galeri/thumb/". basename($nama);
    $Thumb2         = "_gambar/galeri/thumb2/". basename($nama);
    $Fit            = "_gambar/galeri/fit/". basename($nama);
    $target_file    = $target_dir . basename($nama);

    // 3. upload file nya di move ke folder _gambar/galeri/o/
    $upload         = move_uploaded_file($_FILES["filedata"]["tmp_name"], $target_file);


    // 4. Manipulasi replikasi dari folder _gambar/galeri/o/
    try {
        $img = new abeautifulsite\SimpleImage($target_file);
        // Shrink the image proportionally to fit inside a box
        $img->best_fit(300, 200)->save($Fit);
        $img->thumbnail(300, 300)->save($Thumb);
        //$img->flip('x')->rotate(90)->best_fit(320, 200)->sepia()->save('example/result.gif');
        $img->thumbnail(80, 80)->save($Thumb2);

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
else{
    null;
}
?>