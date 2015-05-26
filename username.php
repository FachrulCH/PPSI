<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
include_once "_include/user.php";

$username = $_GET['id'];
$u = User_get_profil_by_name($username);
$user_idnya = enkripsi($u['user_id']);

if (empty($u['user_foto'])){                
    $foto = URLSITUS.'css/images/profile.jpg';
    $foto_o = URLSITUS.'css/images/profile.jpg';
}else{
    $foto = URLSITUS.'_gambar/user/'.$u['user_foto'];
    $foto_o = URLSITUS.'_gambar/user/o/'.$u['user_foto'];
}
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
            .ui-grid-b a{
                text-decoration: none;
            }
        </style>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <section data-role="page" id="home">
            <?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Profil');
            ?>
            <article role="main" class="ui-content">
                <div class="profilHeader">
                    <span class="profilFoto">
                        <a href="#popupPhoto" data-rel="popup" data-position-to="window" data-transition="fade">
                            <img src="<?= $foto ?>" width="100" alt="<?= $username ?>" style=" border: 1px solid #DDDDDD;">
                        </a>
                        <div data-role="popup" id="popupPhoto" data-overlay-theme="b" data-theme="b" data-corners="false">
                            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="<?= $foto_o ?>" style="max-height:512px;" alt="">
                        </div>
                    </span>
                    <span class="profilBio">
                        <strong style="font-size: 1.3em"><?= $u['user_username'] ?></strong>
                        <div class="hrfKecil">
                            <?= $u['user_bio'] ?>  
                        </div>
                        <p class="hrfKecil">
                            Member sejak: <abbr class="timeago" title="<?= $u['user_reg_date'] ?>"><?= $u['user_reg_date'] ?></abbr>
                        </p>
                    </span>
                </div>
                
                <div class="profileDetail">
                    <div class="ui-grid-b">
                        
                        <div class="ui-block-a"><a href="#"><div class="ui-bar ui-bar-b">Pengalaman
                                <div class="profilAngka"><?= $u['user_pengalaman'] ?></div>
                            </div> </a></div>
                       
                        
                        <div class="ui-block-b"><a href="#"><div class="ui-bar ui-bar-b">Perjalanan
                                <div class="profilAngka"><?= $u['user_perjalanan'] ?></div>
                            </div></a></div>
                        
                        
                        <div class="ui-block-c"><a href="#"><div class="ui-bar ui-bar-b">Reputasi
                                <div class="profilAngka"><?= $u['user_reputasi'] ?></div>
                            </div></a></div>
                        
                    </div><!-- /grid-b -->
                </div>
<?php
//*** Tombol kirim pesan pribadi muncul klo yg lihat profil selain user itu sendiri
if ($u['user_id'] != @$_SESSION['user_id']) {
?>
                <div style="text-align: right">
                    <a href="#popupPM" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-left" data-rel="popup" data-position-to="window" data-transition="flip">Pesan pribadi</a>
                </div>
<?php
}else{
?>
                <div class="left">
                    <a href="#inbox" class="ui-btn ui-btn-inline ui-icon-mail ui-btn-icon-left" data-ajax="false">Kotak Masuk</a>
                </div>
                <div class="right">
                    <a href="<?= URLSITUS ?>user/profil/" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-left" data-ajax="false">Edit Profil</a>
                </div>
                <div style="clear: both"></div>
<?php
}
?>
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain"><label for="t_bio">Lokasi</label><p id="t_bio"><?= $u['user_lokasi'] ?></p></li>
                    <li class="ui-field-contain"><label for="t_bio">Umur</label><p id="t_bio"><?= umur($u['user_ttl'])?> tahun</p></li>
                    <li class="ui-field-contain"><label for="t_bio">Perjalanan Favorit</label><p id="t_bio"><?= $u['user_exp'] ?></p></li>
                    <li class="ui-field-contain"><label for="t_bio">Akun sosmed</label><p id="t_bio"><?= $u['user_sosmed'] ?></p></li>
                    <li class="ui-field-contain"><label for="t_bio">Jenis Kelamin</label><p id="t_bio"><?= ($u['user_gender'] == 'P') ? 'Perempuan' : 'Laki-laki'; ?></p></li>
                    <li class="ui-field-contain"><label for="t_bio">Label</label><p id="t_bio"><?= $u['user_reputasi'] ?></p></li>
                </ul>
                
                <div data-role="popup" id="popupPM" data-theme="a" class="ui-corner-all">
                        <div style="padding:10px 20px;">
                            <h3>Pesan Pribadi</h3>
                            <label for="t_pm_judul" class="ui-hidden-accessible">Judul:</label>
                            <input type="text" name="t_pm_judul" id="t_pm_judul" maxlength="25" placeholder="Judul Pesan">
                            <label for="t_pm_pesan" class="ui-hidden-accessible">Pesan:</label>
                            <textarea cols="50" id="t_pm_pesan" maxlength="250" placeholder="Pesan"></textarea>
                            <div class="g-recaptcha" data-sitekey="6LeO_QUTAAAAAJnyTjLm5B9lxRlB6a9Eod8ietRP"></div>
                            <button type="button" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check" id="b_pesan">Kirim</button>
                        </div>
                </div>
            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->
        
        <section data-role="page" id="inbox">
<?php
        // Memanggil fungsi untuk generate panel samping
        get_panel();
        // Membuat menu header, isinya tombol back dan panel
        // Memiliki argumen variabel jugul header
        get_header('Inbox');
?>
	<article role="main" class="ui-content">
            <div data-role="collapsibleset" data-theme="b" data-content-theme="b" data-mini="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">
                <div data-role="collapsible">
                    <h3>si udin :: ini judulnya <abbr class="right">Sejam lalu</abbr></h3>
                    <p>Specify the open and close icons on the set to apply it to all the collapsibles within.</p>
                </div>
                <div data-role="collapsible">
                    <h3>Dari si apah | 2 jam lalu</h3>
                    <p>This collapsible also gets the icon from the set.</p>
                </div>
                <div data-role="collapsible">
                    <h3>Dari tadi | sehari lalu</h3>
                    <p>This collapsible also gets the icon from the set.</p>
                </div>
                <div data-role="collapsible">
                    <h3>Icon set on the set</h3>
                    <p>This collapsible also gets the icon from the set.</p>
                </div>
                <div data-role="collapsible">
                    <h3>Icon set on the set</h3>
                    <p>This collapsible also gets the icon from the set.</p>
                </div>

            </div>
            
	</article><!-- /content -->
<?php
        get_footer();
?>
</section><!-- /page -->

<script type="text/javascript" src="<?= URLSITUS ?>js/jquery.timeago.js"></script> <!-- konversi ke waktu relative -->
<script type="text/javascript" src="<?= URLSITUS ?>js/main.js" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        jQuery("abbr.timeago").timeago(); 	/*konversi ke waktu relative*/
        
        $('#b_pesan').on('click', function () {
            
           //alert("Proses simpan")
           var judulpm = $('#t_pm_judul').val();
           var pesanpm = $('#t_pm_pesan').val();
           
           if (judulpm.trim() == "" || pesanpm.trim() == ""){
               alert("Isi dengan lengkap");
               $('#t_pm_judul').focus();
               return false;
           }
           if(grecaptcha.getResponse() == ""){
                alert("Klik captcha dahulu");
                return false;
            }
            
           var kirim = "t_capcay="+$('#g-recaptcha-response').val()+"&u=<?= $user_idnya ?>&t_judul="+judulpm+"&t_pm_pesan="+pesanpm;
           $( "#popupPM" ).popup( "close" );
           customAjax('<?= URLSITUS ?>api/chatpm/', kirim, function (data) {
                //console.log(data);
                
                $('#t_pm_judul').val("");
                $('#t_pm_pesan').val("");
            });
        });
    });
</script>
    </body>
</html>
<?php
//ob_flush(); ?>