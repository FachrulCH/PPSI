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
		.profilePic{
			text-align: center;
			height: 150px;
		}
		.hrfKecil{
			font-size: 10px;
			margin: -15px 0px 5px 0px;
		}
                .slick-slide{
                    position: relative;
                    margin-right: 5px;
                    margin-left: 5px;
                }
                .caption {
                    font-family: cursive;
                    font-size: .8em;
                    position: absolute;
                    right: 0;
                    bottom: 0;
                    padding: 15px;
                    min-height: 38px;
                    background-color: rgba(255, 255, 255, 0.25);
                    z-index: 50;
                    color: #000;
                }

	</style>
        <link rel="stylesheet" type="text/css" href="css/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css"/>
</head>
<body>
<section data-role="page" id="home">
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
                <div><a href="<?= URLSITUS ?>trip_view.php?id=110" data-ajax="false"><img src="_gambar/galeri/m/1.jpg" height="200" /><div class="caption">Any HTML here</div></a></div>
                <div><a href="<?= URLSITUS ?>trip_view.php?id=110" data-ajax="false"><img src="_gambar/galeri/m/2.jpg" height="200"/><div class="caption">Ini adalah judul perjalanan seru nya</div></a></div>
                <div><a href="<?= URLSITUS ?>trip_view.php?id=110" data-ajax="false"><img src="_gambar/galeri/m/3.jpg" height="200"/><div class="caption">Ini adalah judul perjalanan seru nya ajfhkjahfka</div></a></div>
                <div><a href="<?= URLSITUS ?>trip_view.php?id=110" data-ajax="false"><img src="_gambar/galeri/m/4.jpg" height="200"/><div class="caption">Ini adalah judul perjalanan seru nya fgdgdfhfgh adjkaskjdhkjfdhkas slkdfkdjasfljal kjfalk</div></a></div>
            </div>
<div data-role="navbar">
    <ul>
        <li><a href="#" class="ui-btn-active">Ulasan</a></li>
        <li><a href="#">Rencana</a></li>
        <li><a href="#">Sekitarmu</a></li>
    </ul>
</div><!-- /navbar -->

<ul data-role="listview" data-inset="true">
    <li><a href="#"><img src="_gambar/galeri/m/1.jpg" height="80" />
        <h3>Judul Trip ini</h3>
        <p>Bekasi, jawa barat</p>
        <p class="ui-li-aside">Wisata alam</p>
        </a></li>
    <li><a href="#"><img src="_gambar/galeri/m/2.jpg" height="80" />
        <h3>Judul Trip ini</h3>
        <p>Tasikmalaya, jawa barat</p>
        <p class="ui-li-aside">Wisata Kota</p>
        </a></li>
    <li><a href="#"><img src="_gambar/galeri/m/3.jpg" height="80" />
        <h3>Judul Trip ini</h3>
        <p>Jakarta timur, DKI Jakarta</p>
        <p class="ui-li-aside">Wisata Hiburan</p>
        </a></li>
    <li><a href="#"><img src="_gambar/galeri/m/4.jpg" height="80" />
        <h3>Judul Trip ini</h3>
        <p>Tanggerang, Banten</p>
        <p class="ui-li-aside">Wisata Keluarga</p></a></li>
    <li><a href="#"><img src="_gambar/galeri/m/1.jpg" height="80" />
        <h3>Judul Trip ini</h3>
        <p>Bekasi, jawa barat</p>
        <p class="ui-li-aside">Wisata alam</p>
        </a></li>
</ul>
            <script type="text/javascript" src="js/slick/slick.min.js"></script>
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