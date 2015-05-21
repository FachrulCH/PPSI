<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
include_once "_include/user.php";

$userList = User_seperjalanan();
//var_dump($userList);
print_r($userList);
?>
<!doctype html>
<html>
<head>
<?php
        // memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
        // memiliki argumen title halaman
        get_meta('TemanBackpacker.com');
?>

</head>
<body>
<section data-role="page" id="home">
<?php
        // Memanggil fungsi untuk generate panel samping
        get_panel();
        // Membuat menu header, isinya tombol back dan panel
        // Memiliki argumen variabel jugul header
        get_header('Temukan teman seperjalan');
?>
	<article role="main" class="ui-content">
            <div id="listHeader">
                Bertemu dengan teman backpacker, yang punya tempat tujuan dan waktu yang pas dengan kamu
            </div>
            <div data-role="navbar">
                <ul>
                    <li><a href="#" class="ui-btn-active">Rencana Teman</a></li>
                    <li><a href="#">Teman sekitarmu</a></li>
                    <li><a href="#">Cari detail</a></li>
                </ul>
            </div><!-- /navbar -->
            <ul data-role="listview" data-inset="true" data-divider-theme="a">
<?php
           foreach ($userList as $u) {
               if (!empty($u['user_foto'])){
                    $foto = $u['user_foto'];
                }else{
                    $foto = "default.gif";
                }
                
//                if ($u['trip_date1'] != '0000-00-00'){
//                    $kata_sambung = "ingin";
//                }
?>
                <li>
                    <a href="<?= URLSITUS . "username/" . make_seo_name(@$u['user_username']) ?>/" data-ajax="false">
                        <img src="<?= URLSITUS ."_gambar/user/". @$foto ?>" class="ui-li-thumb">
                        <h2><?= @$u['user_username'] ." berencana ke ". @$u['trip_tujuan']?></h2>
                        <p><?= @$u['trip_judul'] ?></p>
                        <p class="ui-li-aside garisKotak"><?= tanggalan(@$u['trip_date1'])?></p>
                    </a>
                </li>
<?php
            }
?>
                <li>
                    <a href="<?= URLSITUS . "username/" . make_seo_name('pendekar') ?>/" data-ajax="false">
                        <img src="<?= URLSITUS ?>_gambar/user/3.jpg" class="ui-li-thumb">
                        <h2>Si Bolang ingin ke Jogja</h2>
                        <p>Wisata kuliner enak kali ya</p>
                        <p class="ui-li-aside garisKotak">Perjalanan Impian</p>
                    </a>
                </li>
            </ul>
	</article><!-- /content -->
<?php
        get_footer();
?>
</section><!-- /page -->

</body>
</html>
<?php //ob_flush(); ?>