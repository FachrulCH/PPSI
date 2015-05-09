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

    <link rel="stylesheet" type="text/css" href="<?= URLSITUS ?>css/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?= URLSITUS ?>css/slick/slick-theme.css"/>
</head>
<body>
<section data-role="page" id="home" class="ngegrid">
<?php
            // Memanggil fungsi untuk generate panel samping
            get_panel_search();
?>
<?php
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header_index('TemanBackpacker');
?>
	<article role="main" class="ui-content">
            <div class="multiple-items">
                <div><a href="<?= URLSITUS ?>trip_view.php?id=110" data-ajax="false" data-transition="flip"><img src="<?= URLSITUS ?>_gambar/galeri/fit/masjid-jawa-tengah.jpg"/><div class="caption">Wisata religi di Jawa Tengah</div></a></div>
                <div><a href="<?= URLSITUS ?>trip_view.php?id=110" data-ajax="false" data-transition="flip"><img src="<?= URLSITUS ?>_gambar/galeri/fit/air-terjun-gitgit-bal.jpg"/><div class="caption">Segarnya Air Terjun</div></a></div>
                <div><a href="<?= URLSITUS ?>trip_view.php?id=110" data-ajax="false"><img src="<?= URLSITUS ?>_gambar/galeri/fit/anak-band.jpg"/><div class="caption">Festival musik indie heroes 2015</div></a></div>
                <div><a href="<?= URLSITUS ?>trip_view.php?id=110" data-ajax="false"><img src="<?= URLSITUS ?>_gambar/galeri/fit/badak.jpg"/><div class="caption">Petualangan di rimba Lampung</div></a></div>
            </div>
            <p class="hrfKecil ketengah" style="padding-top: 20px;">
                Selamat Datang di TemanBackpacker, situs untuk menemukan rencana liburan dan teman baru mu, <?= tautan('user/registrasi/', 'Ayo gabung!')?></a>
            </p>
            <p class="ketengah" style="font-size: .6em;">Ada 100 Travelers yang berbagi <?= tautan('trip/', '1.000 ulasan perjalanan') ?> , dan <?= tautan('galeri.php', '2.000 foto') ?> loh</p>
            <hr/>
            <div class="ui-grid-b" style="font-family: cursive;">
                <div class="ui-block-a"><div class="ketengah" style=" background-color: rgb(23, 186, 173); min-height:140px;margin: 5px;">
                        <a href="<?= URLSITUS ?>trip/" data-ajax="false"><p class="judul">Rencanakan liburanmu</p><img src="<?= URLSITUS ?>css/images/calendar_64px.png"/></a></div></div>
                <div class="ui-block-b"><div class="ketengah" style=" background-color: rgb(244, 185, 0); min-height:140px;margin: 5px;">
                        <a href="<?= URLSITUS ?>trip/" data-ajax="false"><p class="judul">Temukan teman seperjalanan</p><img src="<?= URLSITUS ?>css/images/pin_64px.png"/></a></div></div>
                <div class="ui-block-c"><div class="ketengah" style=" background-color: rgb(70, 186, 23); min-height:140px;margin: 5px;">
                        <a href="<?= URLSITUS ?>pengalaman/" data-ajax="false"><p class="judul">Berbagi pengalaman</p><img src="<?= URLSITUS ?>css/images/chat_64px.png"/></a></div></div>
            </div><!-- /grid-b -->
            <hr/>
            <br/>

            <div data-role="navbar">
                <ul>
                    <li><a href="#" class="ui-btn-active">Ulasan</a></li>
                    <li><?= tautan('trip/', 'Rencana') ?></li>
                    <li><a href="#">Sekitarmu</a></li>
                </ul>
            </div><!-- /navbar -->

            <ul data-role="listview" data-inset="true">
                <li><a href="#"><img src="<?= URLSITUS ?>_gambar/galeri/thumb/bajak.jpg" class="ui-li-thumb"/>
                        <h3>Judul Trip ini</h3>
                        <p>Bekasi, jawa barat</p>
                        <p class="ui-li-aside">Wisata alam</p>
                    </a></li>
                <li><a href="#"><img src="<?= URLSITUS ?>_gambar/galeri/thumb/dancer-on-the-stage.jpg" class="ui-li-thumb"/>
                        <h3>Judul Trip ini</h3>
                        <p>Jakarta timur, DKI Jakarta</p>
                        <p class="ui-li-aside">Wisata Kota</p>
                    </a></li>
                <li><a href="#"><img src="<?= URLSITUS ?>_gambar/galeri/thumb/air-terjun-gitgit-bal.jpg" class="ui-li-thumb"/>
                        <h3>Judul Trip ini</h3>
                        <p>Bogor, Jawa barat</p>
                        <p class="ui-li-aside">Wisata Hiburan</p>
                    </a></li>
                    <li><a href="#"><img src="<?= URLSITUS ?>_gambar/galeri/thumb/3dloveheart-wide.jpg" class="ui-li-thumb"/>
                        <h3>Judul Trip ini</h3>
                        <p>Tanggerang, Banten</p>
                        <p class="ui-li-aside">Wisata Keluarga</p></a></li>
                <li><a href="#"><img src="<?= URLSITUS ?>_gambar/galeri/thumb/wild-poppies.jpg" class="ui-li-thumb"/>
                        <h3>Judul Trip ini</h3>
                        <p>Bekasi, jawa barat</p>
                        <p class="ui-li-aside">Wisata alam</p>
                    </a></li>
            </ul>
            <script type="text/javascript" src="<?= URLSITUS ?>js/slick/slick.min.js"></script>
            <script type="text/javascript">
            $('.multiple-items').slick({
              mobileFirst: true,
              //infinite: true,
              dots: true,
              dotsClass: 'slick-dots',
              centerMode: true,
              //centerPadding: '60px',
              variableWidth: true,
              lazyLoad: 'ondemand',
              autoplay: true,
              autoplaySpeed: 2000,
              speed: 500
            });
				
            </script>
	</article><!-- /content -->
<?php
	get_footer();
?>
</section><!-- /page -->

</body>
</html>
<?php //ob_flush(); ?>