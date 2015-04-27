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
            .hrfKecil{
                font-size: .8em;
            }
            .ketengah{
                text-align: center;
            }
	</style>
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

            <p>Profile User</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="#" class="ui-btn-active">Informasi</a></li>
                    <li><a href="#privasi">Privasi</a></li>
                    <li><a href="#akun">Akun</a></li>
                </ul>
            </div><!-- /navbar -->
            
            <div class="hrfKecil">
                
                <form action="user_save.php" method="post" data-ajax="false">
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="txt_nama_lengkap">Profil</label>
                        <input type="text" name="txt_nama_lengkap" id="txt_nama_lengkap" value="" data-clear-btn="true">
                    </li>
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
                        <label for="txt_katasandi">Jenis Kelamin</label>
                        <input type="text" name="txt_katasandi" id="txt_katasandi" value="" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_katasandi2">Tanggal Lahir</label>
                        <input type="text" name="txt_katasandi2" id="txt_katasandi2" value="" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_captcha">Pengalaman trip yg tak terlupakan kamu</label>
                        <input type="text" name="txt_captcha" id="txt_captcha" value="" data-clear-btn="true">
                    </li>

                    <li class="ui-field-contain">
                        <label for="name2">Akun Sosial media</label>
                    </li>
                    <li class="ui-field-contain">
                        <label for="name2">Lokasi sekarang </label>
                    </li>
                    
                    <li class="ui-field-contain">
                        <button type="submit" class="ui-btn ui-corner-all ui-btn-a">Simpan</button>
                    </li>
                </ul>
            </form>
            </div>
	</article><!-- /content -->
	<?php
		get_footer();
	?>
</section><!-- /page -->

<section data-role="page" id="privasi">
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
                    <li><a href="#">Informasi</a></li>
                    <li><a href="#privasi" class="ui-btn-active">Privasi</a></li>
                    <li><a href="#akun">Akun</a></li>
                </ul>
            </div><!-- /navbar -->
            
            <div class="hrfKecil">
                
                <form action="user_save.php" method="post" data-ajax="false">
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="txt_nama_lengkap">Profil</label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat</option>
                            <option value="belum">Untuk umum</option>
                            <option value="sedang">Hanya member terdaftar</option>
                            <option value="selesai">Hanya diri sendiri</option>
                        </select>
                    </li>
                    <li class="ui-field-contain">
                        <label for="txt_nama_lengkap">Nama Lengkap</label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat</option>
                            <option value="belum">Untuk umum</option>
                            <option value="sedang">Hanya member terdaftar</option>
                            <option value="selesai">Hanya diri sendiri</option>
                        </select>
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_username">Username</label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat</option>
                            <option value="belum">Untuk umum</option>
                            <option value="sedang">Hanya member terdaftar</option>
                            <option value="selesai">Hanya diri sendiri</option>
                        </select>
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_email">E-mail</label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat</option>
                            <option value="belum">Untuk umum</option>
                            <option value="sedang">Hanya member terdaftar</option>
                            <option value="selesai">Hanya diri sendiri</option>
                        </select>
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_katasandi">Jenis Kelamin</label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat</option>
                            <option value="belum">Untuk umum</option>
                            <option value="sedang">Hanya member terdaftar</option>
                            <option value="selesai">Hanya diri sendiri</option>
                        </select>
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_katasandi2">Tanggal Lahir</label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat</option>
                            <option value="belum">Untuk umum</option>
                            <option value="sedang">Hanya member terdaftar</option>
                            <option value="selesai">Hanya diri sendiri</option>
                        </select>
                    </li>

                    <li class="ui-field-contain">
                        <label for="txt_captcha">Pengalaman trip yg tak terlupakan kamu</label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat</option>
                            <option value="belum">Untuk umum</option>
                            <option value="sedang">Hanya member terdaftar</option>
                            <option value="selesai">Hanya diri sendiri</option>
                        </select>
                    </li>

                    <li class="ui-field-contain">
                        <label for="name2">Akun Sosial media</label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat</option>
                            <option value="belum">Untuk umum</option>
                            <option value="sedang">Hanya member terdaftar</option>
                            <option value="selesai">Hanya diri sendiri</option>
                        </select>
                    </li>
                    <li class="ui-field-contain">
                        <label for="name2">Lokasi sekarang </label>
                        <select name="select-choice-a" data-native-menu="false" data-mini="true">
                            <option>Terlihat</option>
                            <option value="belum">Untuk umum</option>
                            <option value="sedang">Hanya member terdaftar</option>
                            <option value="selesai">Hanya diri sendiri</option>
                        </select>
                    </li>
                    
                    <li class="ui-field-contain">
                        <button type="submit" class="ui-btn ui-corner-all ui-btn-a">Simpan</button>
                    </li>
                </ul>
            </form>
            </div>
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
                    <li><a href="#">Informasi</a></li>
                    <li><a href="#privasi">Privasi</a></li>
                    <li><a href="#akun" class="ui-btn-active">Akun</a></li>
                </ul>
            </div><!-- /navbar -->
            
            <div class="hrfKecil">
                
                <form action="user_save.php" method="post" data-ajax="false">
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain">
                        <label for="txt_nama_lengkap">Ubah kata sandi</label>
                        <input type="text"/>
                    </li>
                    <li class="ui-field-contain">
                        <label for="txt_nama_lengkap">Hapus akun</label>
                    </li>
                    <li class="ui-field-contain">
                        <button type="submit" class="ui-btn ui-corner-all ui-btn-a">Simpan</button>
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