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
</head>
<body>
<section data-role="page" id="home">
<?php
        // Memanggil fungsi untuk generate panel samping
        get_panel();
        // Membuat menu header, isinya tombol back dan panel
        // Memiliki argumen variabel jugul header
        get_header('Login');
?>
	<article role="main" class="ui-content">
            <form action="user_save.php" method="post" data-ajax="false">
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="txt_nama_lengkap">Username/email</label>
                        <input type="text" name="txt_nama_lengkap" id="txt_nama_lengkap" value="" data-clear-btn="true">
                    </li>
                    <li class="ui-field-contain">
                        <label for="txt_password">Kata Sandi</label>
                        <input type="password" name="txt_password" id="txt_password" value="" data-clear-btn="true">
                    </li>
                    <li class="ui-field-contain">
                        <label for="btn_login"></label>
                        <button class="ui-btn ui-icon-user ui-btn-icon-left" type="submit" id="btn_login">Login</button>
                    </li>
                </ul>
            </form>
            <p class="ketengah"><a href="#reset" data-rel="popup" data-position-to="window" data-transition="pop">Lupa Password</a></p>
            <p class="ketengah"><?= tautan('user_reg.php', 'Belum punya akun')?></p>

            <div data-role="popup" id="reset" data-theme="a" class="ui-corner-all">
                <form>
                    <div style="padding:10px 20px;">
                        <h3>Masukan email kamu</h3>
                        <label for="un" class="ui-hidden-accessible">Email</label>
                        <input type="text" name="user" id="un" value="" placeholder="Email user">
                        <button type="submit" class="ui-btn ui-btn-icon-left ui-icon-check">Reset</button>
                    </div>
                </form>
            </div>
	</article><!-- /content -->
<?php
        get_footer();
?>
</section><!-- /page -->

</body>
</html>
<?php //ob_flush(); ?>