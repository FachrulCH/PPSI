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
            <form action="" method="post" data-ajax="false" id="formLogin">
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="t_username">Username/email</label>
                        <input type="text" name="t_username" id="t_username" value="" data-clear-btn="true">
                    </li>
                    <li class="ui-field-contain">
                        <label for="t_password">Kata Sandi</label>
                        <input type="password" name="t_password" id="t_password" value="" data-clear-btn="true" class="required">
                    </li>
                    <li class="ui-field-contain">
                        <label for="btn_login"></label>
                        <button class="ui-btn ui-icon-user ui-btn-icon-left" type="submit" id="btn_login">Login</button>
                    </li>
                </ul>
            </form>
            <p class="ketengah"><a href="#formReset" data-rel="popup" data-position-to="window" data-transition="pop">Lupa Password</a></p>
            <p class="ketengah"><?= tautan('user/registrasi/', 'Belum punya akun')?></p>

<!--            <div data-role="popup" id="formReset" data-theme="a" class="ui-corner-all">
                <form>
                    <div style="padding:10px 20px;">
                        <h3>Masukan email kamu</h3>
                        <label for="un" class="ui-hidden-accessible">Email</label>
                        <input type="text" name="user" id="un" value="" placeholder="Email user">
                        <button type="submit" class="ui-btn ui-btn-icon-left ui-icon-check">Reset</button>
                    </div>
                </form>
            </div>-->
            <script type="text/javascript" src="<?= URLSITUS ?>js/main.js"></script>
            <script type="text/javascript" src="<?= URLSITUS ?>js/jquery.validate.min.js"></script>
            <script type="text/javascript">
                jQuery.validator.addMethod("noSpace", function(value, element) { 
                    return value.indexOf(" ") < 0 && value != ""; 
                }, "Tidak boleh ada spasi");
                
                $.validator.setDefaults({
			submitHandler: function() {
				var kirim = $("#formLogin").serialize();
                                console.log(kirim);
				customAjax('<?= URLSITUS ?>api/login/',kirim,function (data) {
					dialogin(data);
                                        <?php
                                            if (isset($_GET['red'])){
                                                //kalo ada pilihan red berarti setelah login kembali ke halaman sebelumnya
                                        ?>
                                                        setTimeout('window.history.back();',500); // redirect ke halaman sebelumnya
                                        
                                        <?php
                                            }else{
                                        ?>
                                        setTimeout('window.location.href = "<?= URLSITUS ?>user/profil/"',1000); // redirect ke halaman profil user
                                        <?php
                                            }
                                        ?>
				});
				}
			});
		$("#formLogin").validate({
			debug: false,
                        rules: {
				t_username: {
                                    required: true,
                                    noSpace: true,
				}
                        },
			messages: {
				t_username: {
                                    required: "Masukan username atau email kamu"
				}
			}


		});
                /***** validasi formnya *****/
            </script>
	</article><!-- /content -->
<?php
        get_footer();
?>
</section><!-- /page -->

</body>
</html>
<?php //ob_flush(); ?>