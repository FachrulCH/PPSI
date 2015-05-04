<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
include_once "_include/user.php";

$user_id        = $_SESSION['user_id'];
$user_profil    = User_get_profil($user_id); 

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
	?>
	<?php
		// Membuat menu header, isinya tombol back dan panel
		// Memiliki argumen variabel jugul header
		get_header('Profil');
	?>
	<article role="main" class="ui-content">

            <div class="ketengah">
                <img src="<?= URLSITUS ?>css/images/profile.jpg" width="100">
                <p><i><strong><?= $user_profil['user_username'] ?></strong></i></p>
                <p class="hrfKecil">
                  <?= $user_profil['user_bio'] ?>  
                </p>
            </div>
            
            <hr/>
            
            <div data-role="navbar">
                <ul>
                    <li><a href="#home" class="ui-btn-active">Informasi</a></li>
                    <li><a href="#akun" data-transition="flip">Akun</a></li>
                </ul>
            </div><!-- /navbar -->
            
            <div class="hrfKecil">
                
                <form action="" method="post" data-ajax="false" id="userProfile">
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="t_bio">Bio</label>
                        <input type="text" name="t_bio" id="t_bio" value="<?= $user_profil['user_bio'] ?>" data-clear-btn="true" placeholder="Biografi singkat kamu" maxlength="100">
                    </li>
                    <li class="ui-field-contain">
                        <label for="t_nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="t_nama_lengkap" id="t_nama_lengkap" value="<?= $user_profil['user_name'] ?>" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="t_username">Username</label>
                        <input type="text" name="t_username" id="t_username" value="<?= $user_profil['user_username'] ?>" data-clear-btn="true" disabled="disabled">
                    </li>

                    <li class="ui-field-contain">
                        <label for="t_email">E-mail</label>
                        <input type="text" name="t_email" id="t_email" value="<?= $user_profil['user_email'] ?>" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="s_jk">Jenis Kelamin</label>
                        <select name="s_jk" id="s_jk" data-role="slider" data-theme="b">
                            <option value="L">L</option>
                            <option value="P" selected="">P</option>
                        </select>
                    </li>

                    <li class="ui-field-contain">
                        <label for="t_ttl">Tanggal Lahir</label>
                        <input type="date" name="t_ttl" id="t_ttl" value="<?= $user_profil['user_ttl'] ?>" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="t_exp">Perjalanan seperti apa yang kamu sukai</label>
                        <textarea cols="40" rows="8" name="t_exp" id="t_exp" placeholder="Paling suka kalo liburan ke..."><?= $user_profil['user_exp']?></textarea>
                    </li>

                    <li class="ui-field-contain">
                        <label for="t_sosmed">Akun Sosial media</label>
                        <input type="text" name="t_sosmed" id="t_sosmed" value="<?= $user_profil['user_email'] ?>" data-clear-btn="true">
                    </li>
                    <li class="ui-field-contain">
                        <label for="t_lokasi">Lokasi sekarang </label>
                        <input type="text" name="t_lokasi" id="t_lokasi" value="<?= $user_profil['user_lokasi'] ?>" data-clear-btn="true" required="required">
                        <div id="hasil"> 
					<input name="location" type="hidden" value="">
                                        <input name="administrative_area_level_1" type="hidden" value="">
                                        <input name="administrative_area_level_2" type="hidden" value="">
					<input name="formatted_address" type="hidden" value="" id="lokasi2">
<!--					<span name="administrative_area_level_1" id="lokasi"></span>-->
			</div>	
                    </li>
                    
                    <li class="ui-field-contain">
                        <button type="submit" class="ui-btn ui-corner-all ui-btn-a" id="b_simpan_info">Simpan</button>
                    </li>
                </ul>
            </form>
            </div>
            <!-- Peta -->
            <script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
            <script src="<?= URLSITUS ?>js/jquery.geocomplete.min.js"></script>
            <!-- End Peta -->
            
            <script type="text/javascript" src="<?= URLSITUS ?>js/main.js"></script>
            <script type="text/javascript" src="<?= URLSITUS ?>js/jquery.validate.min.js"></script>
            
            <script type="text/javascript">
                $(function(){
                    $("#t_lokasi").geocomplete({
                                  details: "#hasil"
                          });
                          var lokasi = $("#lokasi").html();
                                  $("#lokasi2").val(lokasi);
                });
                
                /***** validasi formnya *****/
                $.validator.setDefaults({
			submitHandler: function() {
				//dialogin("submitted!");
				var kirim = $("#userProfile").serialize();
                                //console.log(kirim);
				customAjax('<?= URLSITUS ?>api/updatemember/',kirim,function (data) {
					dialogin(data);
                                        //setTimeout('window.location.href = "<?= URLSITUS ?>user/login/"',3000); // redirect ke form login
                                        
				});
				}
			});
		$("#userProfile").validate({
			debug: false,
                        rules: {
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

<section data-role="page" id="akun">
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

            <p>Profile User</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="#home" data-transition="flip">Informasi</a></li>
                    <li><a href="#akun" class="ui-btn-active">Akun</a></li>
                </ul>
            </div><!-- /navbar -->
            
            <div class="hrfKecil">
                
                
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="txt_email">Visibilitas</label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat untuk umum</option>
                            <option value="0">Untuk umum</option>
                            <option value="1">Hanya member terdaftar</option>
                        </select>
                    </li>
                    <li class="ui-field-contain">
                        <a href="#popupLogin" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-lock ui-btn-icon-left ui-btn-b" data-transition="pop" id="b_ubah">Ubah kata sandi</a>
                    </li>
                    <li class="ui-field-contain">
                        <a href="#popupDialog" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-delete ui-btn-icon-left ui-btn-b">Hapus Akun</a>
                    </li>   
                </ul>
            </div>
            

<div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
<form>
<div style="padding:10px 20px;">
<h3>Konfirmasi</h3>
<input type="password" name="pass" id="pw" value="" placeholder="Kata sandi sebelumnya:">
<input type="password" name="pass" id="pw" value="" placeholder="Kata sandi baru">
<input type="password" name="pass" id="pw" value="" placeholder="Ulangi kata sandi baru">
<button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Ubah</button>
</div>
</form>
</div>
            

<div data-role="popup" id="popupDialog" data-overlay-theme="b" data-theme="b" data-dismissible="false" style="max-width:400px;">
<div data-role="header" data-theme="a">
<h1>Yah kamu mah gitu :( </h1>
</div>
<div role="main" class="ui-content">
<h3 class="ui-title">Apa kamu yakin mau menghapus akun ini?</h3>
<p>Aksi ini ga bisa di cancel loh ya</p>
<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Batal</a>
<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back" data-transition="flow">Hapus</a>
</div>
</div>
	</article><!-- /content -->
	<?php
		get_footer();
	?>
</section><!-- /page -->
</body>
</html>
<?php // ob_flush(); ?>