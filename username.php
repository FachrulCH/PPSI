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
<script src="<?= URLSITUS ?>src/trianglify/trianglify.min.js"></script>
<script>
var pattern = Trianglify({
      height: window.innerHeight,
      width: window.innerWidth,
      cell_size: 30+Math.random()*100});
$('.cek').append(pattern.svg());
 $('#cek').attr('src',pattern.png());
  </script>
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
        <div class="cek"><image src="" id="cek"/></div>
        <div class="profilHeader">
            <span class="profilFoto">
                <img src="<?= URLSITUS ?>css/images/profile.jpg" width="100">
            </span>
            <span class="profilBio"><strong style="font-size: 1.3em">Si Bolang</strong>
                <div class="hrfKecil">
                    Haii salam kenal  
                </div>
                <p class="hrfKecil">
                    Member sejak: 01-01-2015
                </p>
            </span>
        </div>
                
        <div class="profileDetail">
            <div class="ui-grid-b">
                <div class="ui-block-a"><div class="ui-bar ui-bar-b">Pengalaman
                        <div class="profilAngka">12</div>
                    </div></div>
                <div class="ui-block-b"><div class="ui-bar ui-bar-b">Perjalanan
                        <div class="profilAngka">12</div>
                    </div></div>
                <div class="ui-block-c"><div class="ui-bar ui-bar-b">Reputasi
                        <div class="profilAngka">12</div>
                    </div></div>
            </div><!-- /grid-b -->
        </div>
        <div style="text-align: right"><a href="#" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-left">Pesan pribadi</a></div>
         <ul data-role="listview" data-inset="true">
             <li class="ui-field-contain"><label for="t_bio">Lokasi</label><p id="t_bio">Isinya</p></li>
             <li class="ui-field-contain"><label for="t_bio">Umur</label><p id="t_bio">Isinya</p></li>
             <li class="ui-field-contain"><label for="t_bio">Perjalanan Paling disukai</label><p id="t_bio">Isinya</p></li>
             <li class="ui-field-contain"><label for="t_bio">Akun sosmed</label><p id="t_bio">Isinya</p></li>
             <li class="ui-field-contain"><label for="t_bio">Jenis Kelamin</label><p id="t_bio">Isinya</p></li>
             <li class="ui-field-contain"><label for="t_bio">Label</label><p id="t_bio">Isinya</p></li>
         </ul>
    </article><!-- /content -->
<?php
        get_footer();
?>
</section><!-- /page -->

</body>
</html>
<?php //ob_flush(); ?>