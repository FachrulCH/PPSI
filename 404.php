<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";

?>
<!doctype html>
<html>
<head>
<?php
        // memanggil fungsi untuk generate meta tag dan include file CSS & JS yg diperlukan
        // memiliki argumen title halaman
        get_meta('TemanBackpacker.com');
?>
    <style type="text/css">
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
<section data-role="page" id="home">
<?php
        // Memanggil fungsi untuk generate panel samping
        get_panel();
        // Membuat menu header, isinya tombol back dan panel
        // Memiliki argumen variabel jugul header
        get_header('Error euy');
?>
	<article role="main" class="ui-content">
            <div class="popup">
                <span style="float: left"><img src="css/images/404.gif" class="ketengah"/></span>
                <span style="float: right">
                    <hr/>
                    <strong>"Bukalah kopermu, isi dengan baju, banyak destinasi yang bisa dituju"</strong>
                    <hr/>
                    <br/><br/><br/>
                    Maaf, halaman tidak ditemukan.... <?= tautan('', 'Kembali ke awal')?>
                </span>
                
            </div>
	</article><!-- /content -->
</section><!-- /page -->

</body>
</html>
