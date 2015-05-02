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
        <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<section data-role="page" id="home">
	<?php
		// Memanggil fungsi untuk generate panel samping
		get_panel();
	?>
	<?php
		// Membuat menu header, isinya tombol back dan panel
		// Memiliki argumen variabel jugul header
		get_header('Registrasi');
	?>
	<article role="main" class="ui-content">

            <p>Mengapa gabung di TemanBackpacker?</p>
            <div class="hrfKecil">
                <form action="user_save.php" method="post" data-ajax="false">
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="txt_nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="txt_nama_lengkap" id="txt_nama_lengkap" value="" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_username">Username</label>
                        <input type="text" name="txt_username" id="txt_username" value="" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_email">E-mail</label>
                        <input type="text" name="txt_email" id="txt_email" value="" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_katasandi">Kata sandi</label>
                        <input type="text" name="txt_katasandi" id="txt_katasandi" value="" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_katasandi2">Ulangi kata sandi</label>
                        <input type="text" name="txt_katasandi2" id="txt_katasandi2" value="" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_captcha">Captcha</label>
                        <input type="text" name="txt_captcha" id="txt_captcha" value="" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="name2">Ketentuan Penggunaan</label>
                        Saya menerima ketentuan penggunaan
                    </li>
                    <li class="ui-field-contain">
                        <label for="name2">Captcha</label>
                        <div class="g-recaptcha" data-sitekey="6LeO_QUTAAAAAJnyTjLm5B9lxRlB6a9Eod8ietRP"></div>
                    </li>
                    
                    <li class="ui-field-contain">
                        <button type="submit" class="ui-btn ui-corner-all ui-btn-a">Buat Akun</button>
                    </li>
                </ul>
            </form>
            </div>
	</article><!-- /content -->
	<?php
		get_footer();
	?>
</section><!-- /page -->

</body>
</html>
<?php // ob_flush(); ?>