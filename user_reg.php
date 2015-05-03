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
            <div id="why" style="text-align: justify">
                <h3 class="ketengah">Mengapa gabung di TemanBackpacker?</h3>
            <p class="hrfKecil">TemanBackpacker.com adalah sebuah portal komunitas backpaking yang dapat mempertemukan kamu dengan orang-orang di seluruh Indonesia. </p>
            <p class="hrfKecil">Kamu bisa berinteraksi, berbagi cerita, dan rencana liburan/perjalanan kamu pada teman dekat ataupun member lainya yang membantu mewujudkan rencana liburan tersebut menjadi nyata. </p>
            <p class="hrfKecil">Di TemanBackpacker.com kamu juga dapat melihat pengalaman, trip, post, ataupun foto perjalanan dari orang lain. </p>
            <p class="hrfKecil">Dan member juga dapat menemukan tempat-tempat baru dan wisata sekitar yang mungkin terlewatkan.</p>
            </div>
            <div class="hrfKecil">
                <form action="" method="post" data-ajax="false" id="newMember">
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="t_nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="t_nama_lengkap" id="t_nama_lengkap" value="" data-clear-btn="true"  class="required" maxlength="50">
                    </li>

                    <li class="ui-field-contain">
                        <label for="t_username">Username</label>
                        <input type="text" name="t_username" id="t_username" value="" data-clear-btn="true" maxlength="25">
                    </li>

                    <li class="ui-field-contain">
                        <label for="t_email">E-mail</label>
                        <input type="text" name="t_email" id="t_email" value="" data-clear-btn="true" maxlength="75">
                    </li>

                    <li class="ui-field-contain">
                        <label for="t_katasandi">Kata sandi</label>
                        <input type="password" name="t_katasandi" id="t_katasandi" value="" data-clear-btn="true" class="password" minlength="6">
                    </li>

                    <li class="ui-field-contain">
                        <label for="t_katasandi2">Ulangi kata sandi</label>
                        <input type="password" name="t_katasandi2" id="t_katasandi2" value="" equalTo="#t_katasandi" class="required" data-clear-btn="true" maxlength="40">
                    </li>

                    <li class="ui-field-contain">
                        <label for="name2">Ketentuan Penggunaan</label>
                        <div>Dengan mendaftar, kamu dianggap menerima dan setuju dengan <a href="#" data-ajax="false" data-role="none">ketentuan dan penggunaan TemanBackpacker.com </a></div>
                    </li>
                    <li class="ui-field-contain">
                        <label for="name2">Captcha</label>
                        <div class="g-recaptcha" data-sitekey="6LeO_QUTAAAAAJnyTjLm5B9lxRlB6a9Eod8ietRP"></div>
                    </li>
                    
                     <li class="ui-field-contain">
                        <label for="btn_reg"></label>
                        <button class="ui-btn ui-icon-user ui-btn-icon-left" type="submit" id="btn_reg">Daftar</button>
                    </li>
                </ul>
            </form>
            </div>
            <script type="text/javascript" src="<?= URLSITUS ?>js/main.js"></script>
            <script type="text/javascript" src="<?= URLSITUS ?>js/jquery.validate.min.js"></script>
            
            <script type="text/javascript">
                /***** validasi formnya *****/
                jQuery.validator.addMethod("password", function( value, element ) { 
                    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                        && /\d/.test(value) // has a digit
                }, "Kata sandi minimal 6 karakter dan mengandung angka nya");
                
                jQuery.validator.addMethod("noSpace", function(value, element) { 
                    return value.indexOf(" ") < 0 && value != ""; 
                }, "Tidak boleh ada spasi");

                $.validator.setDefaults({
			submitHandler: function() {
				//dialogin("submitted!");
				var kirim = $("#newMember").serialize();
                                //console.log(kirim);
				customAjax('<?= URLSITUS ?>api/newmember/',kirim,function (data) {
                                        grecaptcha.reset(); //refresh capcay
					dialogin(data);
                                        setTimeout('window.location.href = "<?= URLSITUS ?>user/login/"',3000); // redirect ke form login
                                        
				});
				}
			});
		$("#newMember").validate({
			debug: false,
                        rules: {
				t_username: {
                                    required: true,
                                    noSpace: true,
                                    remote:{
                                        url: "<?= URLSITUS ?>api/cekusername/",
                                        type: "post",
                                        data:
                                        {
                                            usernames: function()
                                            {
                                                return $('#newMember :input[name="t_username"]').val();
                                            }
                                        }
                                    }
				},
                                t_email: {
                                    required: true,
                                    email: true,
                                    remote:{
                                        url: "<?= URLSITUS ?>api/cekemail/",
                                        type: "post",
                                        data:
                                        {
                                            usernames: function()
                                            {
                                                return $('#newMember :input[name="t_email"]').val();
                                            }
                                        }
                                    }
				}
                        },
			messages: {
				t_nama_lengkap: {
                                    required: "Apa nama lengkap kamu?"
				},
                                t_username: { 
                                    remote: jQuery.validator.format("Username ini sudah ada yg punya."),
                                    required: "Mau kita panggil kamu apa nih?"
                                },
                                t_email: {
                                    required: "Email kamu apa?",
                                    email: "Harap masukan alamat email yang valid: namakamu@email.com",
                                    remote: jQuery.validator.format("Email ini sudah ada yg punya.")
                                },
                                t_katasandi2: {
                                    required: " ",
                                    equalTo: "Kata sandi harus sama dengan yang di atas"
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
<?php // ob_flush(); ?>