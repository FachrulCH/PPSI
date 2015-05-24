<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
include_once "_include/Exp.php";

//load data pengalaman terpopuler
$exp    = Exp_list_hot();
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
    <style type="text/css">
        /***** start responsive style grid*/
        /* First breakpoint is 48em (768px). 3 column layout. Tiles 250x250 pixels incl. margin at the breakpoint. */
        @media ( min-width: 48em ) {
            .ngegrid .ui-content {
                padding: .5625em; /* 9px */
            }
            .ngegrid .ui-listview li {
                float: left;
                width: 30.9333%; /* 33.3333% incl. 2 x 1.2% margin */
                height: 14.5em; /* 232p */
                margin: .5625em 1.2%;
            }
            .ngegrid .ui-listview li > .ui-btn {
                -webkit-box-sizing: border-box; /* include padding and border in height so we can set it to 100% */
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                height: 100%;
            }
            .ngegrid .ui-listview li.ui-li-has-thumb .ui-li-thumb {
                height: auto; /* To keep aspect ratio. */
                max-width: 100%;
                max-height: none;
            }
            /* Make all list items and anchors inherit the border-radius from the UL. */
            .ngegrid .ui-listview li,
            .ngegrid .ui-listview li .ui-btn,
            .ngegrid .ui-listview .ui-li-thumb {
                -webkit-border-radius: inherit;
                border-radius: inherit;
            }
            /* Hide the icon */
            .ngegrid .ui-listview .ui-btn-icon-right:after {
                display: none;
            }
            /* Make text wrap. */
            .ngegrid .ui-listview h2,
            .ngegrid .ui-listview p {
                white-space: normal;
                overflow: visible;
                position: absolute;
                left: 0;
                right: 0;
            }
            /* Text position */
            .ngegrid .ui-listview h2 {
                font-size: 1.1em;
                margin: 0;
                padding: .125em 1em;
                bottom: 50%;
                border-bottom: 1px solid #FFF;
                text-align: center;
            }
            .ngegrid .ui-listview p {
                font-size: 1em;
                margin: 0;
                padding: 0 1.25em;
                min-height: 50%;
                bottom: 0;
            }
            /* Semi transparent background and different position if there is a thumb. The button has overflow hidden so we don't need to set border-radius. */
            .ui-listview .ui-li-has-thumb h2,
            .ui-listview .ui-li-has-thumb p {
                background: #111;
                background: rgba(255, 255, 255, 0.5);

            }
            .ui-listview .ui-li-has-thumb h2 {
                bottom: 35%;
            }
            .ui-listview .ui-li-has-thumb p {
                min-height: 35%;
            }
            /* ui-li-aside has class .ui-li-desc as well so we have to override some things. */
            .ngegrid .ui-listview .ui-li-aside {
                padding: .125em .625em;
                width: auto;
                min-height: 0;
                top: 0;
                left: auto;
                bottom: auto;
                /* Custom styling. */
                background: #FFFFFF;
                background: rgba(255, 255, 255, 0.85);
                -webkit-border-top-right-radius: inherit;
                border-top-right-radius: inherit;
                -webkit-border-bottom-left-radius: inherit;
                border-bottom-left-radius: inherit;
                -webkit-border-bottom-right-radius: 0;
                border-bottom-right-radius: 0;
            }
            /* If you want to add shadow, don't kill the focus style. */
            .ngegrid .ui-listview li {
                -moz-box-shadow: 0px 0px 9px #111;
                -webkit-box-shadow: 0px 0px 9px #111;
                box-shadow: 0px 0px 9px #111;
            }
            /* Images mask the hover bg color so we give desktop users feedback by applying the focus style on hover as well. */
            .ngegrid .ui-listview li > .ui-btn:hover {
                -moz-box-shadow: 0px 0px 12px #33ccff;
                -webkit-box-shadow: 0px 0px 12px #33ccff;
                box-shadow: 0px 0px 12px #33ccff;
            }
            /* Animate focus and hover style, and resizing. */
            .ngegrid .ui-listview li,
            .ngegrid .ui-listview .ui-btn {
                -webkit-transition: all 500ms ease;
                -moz-transition: all 500ms ease;
                -o-transition: all 500ms ease;
                -ms-transition: all 500ms ease;
                transition: all 500ms ease;
            }
        }

        /* Second breakpoint is 63.75em (1020px). 4 column layout. Tiles will be 250x250 pixels incl. margin again at the breakpoint. */
        @media ( min-width: 63.75em ) {
            .ngegrid .ui-content {
                padding: .625em; /* 10px */
            }
            /* Set a max-width for the last breakpoint to prevent too much stretching on large screens.
            By setting the max-width equal to the breakpoint width minus padding we keep square tiles. */
            .ngegrid .ui-listview {
                max-width: 62.5em; /* 1000px */
                margin: 0 auto;
            }
            /* Because of the 1000px max-width the width will always be 230px (and margin left/right 10px),
            but we stick to percentage values for demo purposes. */
            .ngegrid .ui-listview li {
                width: 23%;
                height: 230px;
                margin: .625em 1%;
            }
        }
    </style>
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
                        <a href="<?= URLSITUS ?>user/" data-ajax="false"><p class="judul">Temukan teman seperjalanan</p><img src="<?= URLSITUS ?>css/images/pin_64px.png"/></a></div></div>
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
<!--                <li><a href="#"><img src="<?= URLSITUS ?>_gambar/galeri/thumb/bajak.jpg" class="ui-li-thumb"/>
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
                    </a></li>-->
<?php
                Tmplt_generate_list_exp_index($exp);
?>
            </ul>
            <div style="clear: both">
                <a href="<?= URLSITUS ?>pengalaman/" class="ui-btn"> Lihat semua ulasan wisata</a>
            </div>
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