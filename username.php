<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
include_once "_include/user.php";

$username = $_GET['id'];
$u = User_get_profil_by_name($username);

if (empty($u['user_foto'])){                
    $foto = URLSITUS.'css/images/profile.jpg';
}else{
    $foto = URLSITUS.'_gambar/user/'.$u['user_foto'];
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
                        <img src="<?= $foto ?>" width="100">
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
                <div style="text-align: right">
                    <a href="#popupPM" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-left" data-rel="popup" data-position-to="window" data-transition="flip">Pesan pribadi</a>
                </div>
                <ul data-role="listview" data-inset="true">
                    <li class="ui-field-contain"><label for="t_bio">Lokasi</label><p id="t_bio"><?= $u['user_lokasi'] ?></p></li>
                    <li class="ui-field-contain"><label for="t_bio">Umur</label><p id="t_bio"><?= $u['user_ttl'] ?></p></li>
                    <li class="ui-field-contain"><label for="t_bio">Perjalanan Paling disukai</label><p id="t_bio"><?= $u['user_exp'] ?></p></li>
                    <li class="ui-field-contain"><label for="t_bio">Akun sosmed</label><p id="t_bio"><?= $u['user_sosmed'] ?></p></li>
                    <li class="ui-field-contain"><label for="t_bio">Jenis Kelamin</label><p id="t_bio"><?= $u['user_gender'] ?></p></li>
                    <li class="ui-field-contain"><label for="t_bio">Label</label><p id="t_bio"><?= $u['user_reputasi'] ?></p></li>
                </ul>
                
                <div data-role="popup" id="popupPM" data-theme="a" class="ui-corner-all">
                        <div style="padding:10px 20px;">
                            <h3>Pesan Pribadi</h3>
                            <label for="un" class="ui-hidden-accessible">Judul:</label>
                            <input type="text" name="t_judul" id="un" value="" placeholder="Judul Pesan">
                            <label for="pw" class="ui-hidden-accessible">Pesan:</label>
                            <textarea cols="50"></textarea>
                            <button type="button" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check" id="b_pesan">Kirim</button>
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
           alert("Proses simpan")    
        });
    });
</script>
    </body>
</html>
<?php
//ob_flush(); ?>