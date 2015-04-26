<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
//    ob_start("ob_gzhandler");
//else
//    ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
include_once "_include/trip.php";

$m          = isset($_GET['m'] ) ? $_GET['m'] : 'new';
$page       = isset($_GET['page'] ) ? (int) $_GET['page'] : 1; // mengambil data trip
$batas      = 2;                                       // jumlah trip perhalaman
$jumData    = Trip_total();                             //Jumlah halaman
$JmlHalaman = ceil($jumData/$batas);                    //ceil digunakan untuk pembulatan keatas

// Validasi biar ga eror kalo masukin halaman yg 
if ($page > $JmlHalaman){                               
    $page = $JmlHalaman;
}

if ($m == 'hot') {
    // Karena hot trip cuma 10 trip dengan jumlah komentar teratas maka perlu di set default value
    $page   = 1;
    $batas  = 10;
    $trip = Trip_load_hot($page, $batas);
    $JmlHalaman = 1;
}else{
    $trip = Trip_load_new($page, $batas);
}

//Navigasi ke sebelumnya
if ($page > 1) {
    $link = $page - 1;
    $prev = "<a href='?page=1' class='ui-shadow ui-btn'> << </a>";
} else {
    $prev = "";  // Posisi di halaman pertama
}

//Navigasi nomor
$nmr = '';
for ($i = 1; $i <= $JmlHalaman; $i++) {

    if ($i == $page) {
        $nmr .= "<a href='?page=1' class='ui-shadow ui-btn ui-btn-active'> $i </a>" . " ";
    } else {
        $nmr .= "<a href='?page=$i' class='ui-shadow ui-btn'>$i</a> ";
    }
}

//Navigasi ke selanjutnya
if ($page < $JmlHalaman) {
    $link = $page + 1;
    $next = " <a href='?page=$JmlHalaman' class='ui-shadow ui-btn'> >> </a>";
} else {
    $next = "";
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
            .profilePic{
                text-align: center;
                height: 150px;
            }
            .hrfKecil{
                font-size: 10px;
                margin: -15px 0px 5px 0px;
            }
            hr{
                border-top-color: #DADADA;
            }
            .breadcrumb{
                position: relative;
                display: block;
                overflow: hidden;
                clear: both;
                font-size: 1.1em;
            }
            .breadcrumb li {
                display: inline;
            }
            .breadcrumb li+li:before {
                content:"» ";
            }
            #brdcmb{
                position: relative;
                left: -30px;
            }
            .blok a:link{
                text-decoration: none;
                font-size: .8em;
                font-weight: 300;
                line-height: 1.4;
                margin: .7em 0;
            }
            .blok h3{
                font-size: .9em;
                font-weight: 300;
                color: #3eb249;
                border-bottom: 1px solid #ddd;
                padding-bottom: .25em;
                margin: 0 0 .5em;
            }

            /***** start responsive style grid*/
            /* First breakpoint is 48em (768px). 3 column layout. Tiles 250x250 pixels incl. margin at the breakpoint. */
            @media ( min-width: 48em ) {
                .trip-grid .ui-content {
                    padding: .5625em; /* 9px */
                }
                .trip-grid .ui-listview li {
                    float: left;
                    width: 30.9333%; /* 33.3333% incl. 2 x 1.2% margin */
                    height: 14.5em; /* 232p */
                    margin: .5625em 1.2%;
                }
                .trip-grid .ui-listview li > .ui-btn {
                    -webkit-box-sizing: border-box; /* include padding and border in height so we can set it to 100% */
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    height: 100%;
                }
                .trip-grid .ui-listview li.ui-li-has-thumb .ui-li-thumb {
                    height: auto; /* To keep aspect ratio. */
                    max-width: 100%;
                    max-height: none;
                }
                /* Make all list items and anchors inherit the border-radius from the UL. */
                .trip-grid .ui-listview li,
                .trip-grid .ui-listview li .ui-btn,
                .trip-grid .ui-listview .ui-li-thumb {
                    -webkit-border-radius: inherit;
                    border-radius: inherit;
                }
                /* Hide the icon */
                .trip-grid .ui-listview .ui-btn-icon-right:after {
                    display: none;
                }
                /* Make text wrap. */
                .trip-grid .ui-listview h2,
                .trip-grid .ui-listview p {
                    white-space: normal;
                    overflow: visible;
                    position: absolute;
                    left: 0;
                    right: 0;
                }
                /* Text position */
                .trip-grid .ui-listview h2 {
                    font-size: 1.25em;
                    margin: 0;
                    padding: .125em 1em;
                    bottom: 50%;
                }
                .trip-grid .ui-listview p {
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
                .trip-grid .ui-listview .ui-li-aside {
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
                .trip-grid .ui-listview li {
                    -moz-box-shadow: 0px 0px 9px #111;
                    -webkit-box-shadow: 0px 0px 9px #111;
                    box-shadow: 0px 0px 9px #111;
                }
                /* Images mask the hover bg color so we give desktop users feedback by applying the focus style on hover as well. */
                .trip-grid .ui-listview li > .ui-btn:hover {
                    -moz-box-shadow: 0px 0px 12px #33ccff;
                    -webkit-box-shadow: 0px 0px 12px #33ccff;
                    box-shadow: 0px 0px 12px #33ccff;
                }
                /* Animate focus and hover style, and resizing. */
                .trip-grid .ui-listview li,
                .trip-grid .ui-listview .ui-btn {
                    -webkit-transition: all 500ms ease;
                    -moz-transition: all 500ms ease;
                    -o-transition: all 500ms ease;
                    -ms-transition: all 500ms ease;
                    transition: all 500ms ease;
                }
            }

            /* Second breakpoint is 63.75em (1020px). 4 column layout. Tiles will be 250x250 pixels incl. margin again at the breakpoint. */
            @media ( min-width: 63.75em ) {
                .trip-grid .ui-content {
                    padding: .625em; /* 10px */
                }
                /* Set a max-width for the last breakpoint to prevent too much stretching on large screens.
                By setting the max-width equal to the breakpoint width minus padding we keep square tiles. */
                .trip-grid .ui-listview {
                    max-width: 62.5em; /* 1000px */
                    margin: 0 auto;
                }
                /* Because of the 1000px max-width the width will always be 230px (and margin left/right 10px),
                but we stick to percentage values for demo purposes. */
                .trip-grid .ui-listview li {
                    width: 23%;
                    height: 230px;
                    margin: .625em 1%;
                }
            }


            /***** end responsive style grid*/
        </style>
    </head>
    <body>
        <section data-role="page" id="home" class="trip-grid">
            <?php
            // Memanggil fungsi untuk generate panel samping
            //get_panel();
            ?>
            <?php
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Perjalanan');
            ?>
            <article role="main" class="ui-content" class="ui-content" >
                <div data-role="navbar">
                    <ul>
                        <li><a href="?m=new" <?php if (!isset($_GET['m']) OR $_GET['m'] == 'new'){ echo 'class="ui-btn-active"'; }?> >New Trip</a></li>
                        <li><a href="?m=hot" <?php if (@$_GET['m'] == 'hot'){ echo 'class="ui-btn-active"'; }?>>Hot Trip</a></li>
                        <li><a href="#browse">Browse Trip</a></li>
                    </ul>
                </div><!-- /navbar -->
                <span style="float:left;">
                    <div class="breadcrumb">
                        <div id="brdcmb">
                            <ul>
                                <li><a href="<?= URLSITUS ?>" data-ajax="false">Home</a></li>
                                <li><a href="<?= URLSITUS ?>trip.php#home">Trip</a></li>
                            </ul>
                        </div>
                    </div>
                </span>
                <span style="float:right;">
                    <a href="<?= URLSITUS ?>trip_new.php" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-left" data-ajax="false">Buat trip baru</a>
                </span>
                <div style="clear: both;"></div>
                <hr/>
                <ul data-role="listview" data-inset="true">
<?php
                if ($trip == FALSE){
                    echo 'Data Trip tidak ditemukan';
                }else{
                    // Looping data trip terbaru
                    foreach ($trip as $t){
?>
                    <li><a href="<?= URLSITUS ?>trip_view.php?id=<?= $t['trip_id'] ?>" data-ajax="false">
                            <img src="<?= URLSITUS ?>_gambar/galeri/<?= $t['trip_gambar'] ?>" class="ui-li-thumb">
                            <h2><?= $t['trip_tujuan_provinsi'] ?></h2>
                            <p><?= $t['trip_judul'] ?></p>
                            <p class="ui-li-aside"><?= $t['param_name'] ?></p>
                        </a></li>
<?php
                    }
                }
?>
                </ul>
                <div style="text-align: center; clear: both" data-role="controlgroup" data-type="horizontal" data-mini="true">
<?php
            if ($JmlHalaman != '1'){
                // Kalo jumlah halaman ada lebih dari 1, tampil paging
                // Tampilkan navigasi
                echo $prev . $nmr . $next;
            }
?>
                </div>
            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->
        <section data-role="page" id="browse">
            <?php
            // Memanggil fungsi untuk generate panel samping
            //get_panel();
            ?>
            <?php
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Perjalanan');
            ?>
            <article role="main" class="ui-content" class="ui-content" >
                <div data-role="navbar">
                    <ul>
                        <li><a href="?m=new" <?php if (!isset($_GET['m']) OR $_GET['m'] == 'new'){ echo 'class="ui-btn-active"'; }?> >New Trip</a></li>
                        <li><a href="?m=hot" <?php if (@$_GET['m'] == 'hot'){ echo 'class="ui-btn-active"'; }?>>Hot Trip</a></li>
                        <li><a href="#browse">Browse Trip</a></li>
                    </ul>
                </div><!-- /navbar -->
                <span style="float:left;">
                    <div class="breadcrumb">
                        <div id="brdcmb">
                            <ul>
                                <li><a href="<?= URLSITUS ?>" data-ajax="false">Home</a></li>
                                <li><a href="<?= URLSITUS ?>trip.php" data-ajax="false">Trip</a></li>
                                <li><a href="<?= URLSITUS ?>trip.php#browse" data-ajax="false">Browse</a></li>
                            </ul>
                        </div>
                    </div>
                </span>
                <div style="clear: both"></div>
                <h3 class="ui-bar ui-bar-a ui-corner-all">Provinsi</h3>
                <div class="ui-body ui-body-a ui-corner-all">
                    <div class="ui-grid-b">
                        <div class="ui-block-a">
                            <div class="blok">
                                <p><a href="#">Nanggroe Aceh Darussalam</a></p>    
                                <p><a href="#" data-ajax="false">Sumatera Utara</a></p>
                                <p><a href="#" data-ajax="false">Bengkulu</a></p>
                                <p><a href="#" data-ajax="false">Jambi</a></p>
                                <p><a href="#" data-ajax="false">Riau</a></p>
                                <p><a href="#" data-ajax="false">Sumatera Barat</a></p>
                                <p><a href="#" data-ajax="false">Sumatera Selatan</a></p>
                                <p><a href="#" data-ajax="false">Kepulauan Riau</a></p>
                                <p><a href="#" data-ajax="false">Lampung</a></p>
                                <p><a href="#" data-ajax="false">Kepulauan Bangka-Belitung</a></p>
                                <p><a href="#" data-ajax="false">Kepulauan Riau</a></p>
                            </div>
                        </div>
                        <div class="ui-block-b">
                            <div class="blok">
                                <p><a href="#" data-ajax="false">Banten</a></p>    
                                <p><a href="#" data-ajax="false">Jawa Barat</a></p>
                                <p><a href="#" data-ajax="false">DKI Jakarta</a></p>
                                <p><a href="#" data-ajax="false">Jawa Tengah</a></p>
                                <p><a href="#" data-ajax="false">Jawa Timur</a></p>
                                <p><a href="#" data-ajax="false">Daerah Istimewa Yogyakarta</a></p>
                                <p><a href="#" data-ajax="false">Bali</a></p>
                                <p><a href="#" data-ajax="false">Nusa Tenggara Barat</a></p>
                                <p><a href="#" data-ajax="false">Nusa Tenggara Timur</a></p>
                                <p><a href="#" data-ajax="false">Kalimantan Barat</a></p>
                                <p><a href="#" data-ajax="false">Kalimantan Selatan</a></p>
                            </div>
                        </div>
                        <div class="ui-block-c">
                            <div class="blok">
                                <p><a href="#" data-ajax="false">Kalimantan Tengah</a></p>    
                                <p><a href="#" data-ajax="false">Kalimantan Timur</a></p>
                                <p><a href="#" data-ajax="false">Gorontalo</a></p>
                                <p><a href="#" data-ajax="false">Sulawesi Selatan</a></p>
                                <p><a href="#" data-ajax="false">Sulawesi Tenggara</a></p>
                                <p><a href="#" data-ajax="false">Sulawesi Tengah</a></p>
                                <p><a href="#" data-ajax="false">Sulawesi Utara</a></p>
                                <p><a href="#" data-ajax="false">Sulawesi Barat</a></p>
                                <p><a href="#" data-ajax="false">Maluku</a></p>
                                <p><a href="#" data-ajax="false">Maluku Utara</a></p>
                                <p><a href="#" data-ajax="false">Papua Barat</a></p>
                                <p><a href="#" data-ajax="false">Papua</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h3 class="ui-bar ui-bar-a ui-corner-all">Jenis Kegiatan</h3>
                <div class="ui-body ui-body-a ui-corner-all">
                    <div class="ui-grid-c ui-responsive">
                        <div class="ui-block-a">
                            <div class="blok">
                                <h3>Wisata Kota</h3>
                                <p><a href="#" data-ajax="false">Alun-alun</a></p>    
                                <p><a href="#" data-ajax="false">Pasar</a></p>
                                <p><a href="#" data-ajax="false">Taman kota</a></p>
                                <p><a href="#" data-ajax="false">Peninggalan sejarah</a></p>
                                <p><a href="#" data-ajax="false">Landmark Kota</a></p>
                            </div>
                        </div>
                        <div class="ui-block-b">
                            <div class="blok">
                                <h3>Wisata Budaya</h3>
                                <p><a href="#" data-ajax="false">Kampung adat</a></p>    
                                <p><a href="#" data-ajax="false">Suku</a></p>
                                <p><a href="#" data-ajax="false">Kerajinan</a></p>
                                <p><a href="#" data-ajax="false">Upacara tradisional</a></p>
                            </div>
                        </div>
                        <div class="ui-block-c">
                            <div class="blok">
                                <h3>Wisata Hiburan</h3>
                                <p><a href="#" data-ajax="false">Taman Bermain</a></p>    
                                <p><a href="#" data-ajax="false">Festival</a></p>
                                <p><a href="#" data-ajax="false">Konser Musik</a></p>
                            </div>
                        </div>
                        <div class="ui-block-d">
                            <div class="blok">
                                <h3>Wisata Alam</h3>
                                <p><a href="#" data-ajax="false">Pantai</a></p>    
                                <p><a href="#" data-ajax="false">Pulau</a></p>
                                <p><a href="#" data-ajax="false">Gunung</a></p>
                                <p><a href="#" data-ajax="false">Gua</a></p>
                                <p><a href="#" data-ajax="false">Air Terjun</a></p>
                                <p><a href="#" data-ajax="false">Danau</a></p>
                                <p><a href="#" data-ajax="false">Sungai</a></p>
                                <p><a href="#" data-ajax="false">Hutan</a></p>
                                <p><a href="#" data-ajax="false">Kawah</a></p>
                                <p><a href="#" data-ajax="false">Taman Nasional</a></p>
                                <p><a href="#" data-ajax="false">Waduk</a></p>
                                <p><a href="#" data-ajax="false">Rawa</a></p>
                                <p><a href="#" data-ajax="false">Mata Air</a></p>
                            </div>
                        </div>
                    </div>
                </div>
  
                </ul>

            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->
    </body>
</html>
<?php // ob_flush(); ?>