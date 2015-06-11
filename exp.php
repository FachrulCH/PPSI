<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
//    ob_start("ob_gzhandler");
//else
//    ob_start();
include_once "_include/db_function.php";
include_once "_include/template.php";
include_once "_include/Exp.php";

$m = isset($_GET['m']) ? $_GET['m'] : 'new';
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // mengambil data trip
$batas = 5;                                             // jumlah trip perhalaman
$jumData = Exp_count();                                //Jumlah halaman
$JmlHalaman = ceil($jumData / $batas);                  //ceil digunakan untuk pembulatan keatas

$breadcumb = array
    (array("link" => URLSITUS, "text" => "Home"),
    array("link" => URLSITUS . "pengalaman/#home", "text" => "Pengalaman")
);

// Validasi biar ga eror kalo masukin halaman yg 
if ($page > $JmlHalaman) {
    $page = $JmlHalaman;
}

//if ($m == 'hot') {
//    // Karena hot trip cuma 10 trip dengan jumlah komentar teratas maka perlu di set default value
//    $page = 1;
//    $batas = 10;
//    $trip = Trip_load_hot($page, $batas);
//    $JmlHalaman = 1;
//    $breadcumb[] = array("link" => URLSITUS . "trip/?m=hot", "text" => "Hot");
//} else {
//    $trip = Trip_load_new($page, $batas);
//}

//*** LOad hot trip


$hot_trip = Exp_list_hot();
$new_trip = Exp_list_new($page, $batas);

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

$loadKategori1 = Tmplt_get_kategori1();
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

        </style>
    </head>
    <body>
        <section data-role="page" id="new" class="trip-grid">
            <?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Pengalaman Liburan');
            ?>
            <article role="main" class="ui-content" class="ui-content" >
                <span class="left">
                    <span class="breadcrumb">
                        <span id="brdcmb">
                            <ul>
                                <?php
                                Tmplt_generate_breadcumb($breadcumb);
                                ?>
                            </ul>
                        </span>
                    </span>
                </span>
<?php
if (isLogin()){
    // User udah login
?>
                <span class="right">
                    <a href="<?= URLSITUS ?>pengalaman/baru/" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-left" data-ajax="false">Buat ulasan baru</a>
                </span>
<?php
}
?>
                <div class="clear"></div>
                <div data-role="navbar">
                    <ul>                           
                        <li><a href="#new" data-transition="flip" class="ui-btn-active">Baru</a></li>
                        <li><a href="#hot" data-transition="fade">Seru</a></li>
                        <li><a href="#browse" data-transition="pop">Telusuri</a></li>
                    </ul>
                </div><!-- /navbar -->

                <ul data-role="listview" data-inset="true">
<?php
//debuging($new_trip);
                            Exp_list($new_trip);
?>
                </ul>
                <div style="text-align: center; clear: both" data-role="controlgroup" data-type="horizontal" data-mini="true">
                    <?php
                    if ($JmlHalaman != '1') {
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
        
        
         <section data-role="page" id="hot" class="trip-grid">
            <?php
            // Memanggil fungsi untuk generate panel samping
            get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Ulasan Pengalaman terseru');
            ?>
            <article role="main" class="ui-content" class="ui-content" >
                <span class="left clear">
                    <div class="breadcrumb">
                        <div id="brdcmb">
                            <ul>
                                <?php
                                Tmplt_generate_breadcumb($breadcumb);
                                ?>
                            </ul>
                        </div>
                    </div>
                </span>
<?php
if (isLogin()){
    // User udah login
?>
                <span class="right">
                    <a href="<?= URLSITUS ?>pengalaman/baru/" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-left" data-ajax="false">Buat ulasan baru</a>
                </span>
<?php
}
?>
                <div class="clear"></div>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#new" data-transition="flip">Baru</a></li>
                        <li><a href="#hot" data-transition="fade" class="ui-btn-active">Seru</a></li>
                        <li><a href="#browse" data-transition="pop">Telusuri</a></li>
                    </ul>
                </div><!-- /navbar -->

                <hr/>
                <ul data-role="listview" data-inset="true">
<?php
//debuging($hot_trip);
                Exp_list($hot_trip);
?>
                </ul>
                
            </article><!-- /content -->
            <?php
            get_footer();
            ?>
        </section><!-- /page -->
<!-- =================================================================================== -->        
        <section data-role="page" id="browse">
            <?php
            // Memanggil fungsi untuk generate panel samping
            //get_panel();
            // Membuat menu header, isinya tombol back dan panel
            // Memiliki argumen variabel jugul header
            get_header('Cari ulasan liburan');
            ?>
            <article role="main" class="ui-content" class="ui-content" >
                <span style="float:left;">
                    <div class="breadcrumb">
                        <div id="brdcmb">
                            <ul>
<?php
                            Tmplt_generate_breadcumb($breadcumb);
?>
                                <li><a href="#browse" data-ajax="false">Browse</a></li>
                            </ul>
                        </div>
                    </div>
                </span>

                <div style="clear: both"></div>

                <div data-role="navbar">
                    <ul>
                        <li><a href="#new" data-transition="flip">Baru</a></li>
                        <li><a href="#hot" data-transition="fade">Seru</a></li>
                        <li><a href="#browse" data-transition="pop" class="ui-btn-active">Telusuri</a></li>
                    </ul>
                </div><!-- /navbar -->

                <form id="f_pencarian">
                    <li class="ui-field-contain">
                        <label for="t_tujuan">Lokasi tujuan</label>
                        <input type="text" name="t_tujuan" id="t_tujuan" value="" data-clear-btn="true" required="required">
                        <div id="hasil"> 
                            <input name="location" type="hidden" value="" id="t_location">
                            <input name="formatted_address" type="hidden" value="" id="lokasi2">
<!--					<span name="administrative_area_level_1" id="lokasi"></span>-->
                        </div>	
                    </li>
                    <div id="cari_detail" style="display: none;">
                        
                        <label for="s_kategori" class="select">Kategori</label>
                        <select name="s_kategori" id="s_kategori" data-native-menu="false">
                                <option value="1">Apapun</option>
                            <?php
                            // Semua data kategori dari parameter di munculkan
                            foreach ($loadKategori1 as $k) {
                                ?>
                                <option value="<?= $k['param_id'] ?>"><?= $k['param_name'] ?></option>
<?php
}
?>
                        </select>                     
                    </div>
                    <li class="ui-field-contain">
                        <button id="b_cari" class="ui-btn ui-btn-icon-left ui-icon-search">Cari</button>
                    </li>

                    <button id="b_detail" class="ui-btn ui-btn-icon-left ui-icon-arrow-d">Lebih rinci</button>
                    <input type="hidden" name="t_def" id="t_def" value="1">
                </form>
                
                <ul data-role="listview" data-inset="true" data-divider-theme="a" id="listSearch">
                </ul>
                
            </article><!-- /content -->
<?php
get_footer();
?>
        </section><!-- /page -->
        <!-- Peta -->
        <script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
        <script src="<?= URLSITUS ?>js/jquery.geocomplete.min.js"></script>
        <!-- End Peta -->
        <script src="<?= URLSITUS ?>js/main.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                $("#t_tujuan").geocomplete({
                    details: "#hasil"
                });
                
                $('#b_detail').on('click',function(){
                    
                    if ($('#cari_detail').is(":visible")){
                        $('#cari_detail').hide(500);
                        $('#t_def').val('1');
                    }else{
                        $('#cari_detail').show(500);
                        $('#t_def').val('0');
                    }
                    return false;
                });
                
                $('#b_cari').on('click',function(){
                    var data = $('#f_pencarian').serialize();
                    console.log(data);
                    customAjax('<?= URLSITUS ?>api/expsearch/', data, function (data) {
                            console.log(data);
                            $('#listSearch').empty();
                            if (data.length > 0) {
                                for (i = 0; i < data.length; i++) {
                                    //alert(obj.tagName);
                                    var html = '<li><a href="'+ data[i].href +'" data-ajax="false"><img src="'+ URLSITUS +'_gambar/galeri/thumb2/'+data[i].trip_gambar+'" class="ui-li-thumb"><p class="normalin"><b>'+ data[i].trip_judul +'</b></p><p class="hrfKecilBgt">'+ data[i].label +'</p><p class="hrfKecilBgt normalin">'+ data[i].trip_date +'</p><p class="ui-li-aside garisKotak">'+ data[i].distance +' Km</p></a></li>';
                                    $('#listSearch').append(html);
                                }
                                ;
                                $('#listSearch').listview('refresh');
                            } else {
                                var html = "Hmm.. sepertinya belum ada ulasan liburan temanbackpacker disekitar sini (>_<)";
                                dialogin(html);
                                $('#listSearch').append(html);
                            }
                        });
                    return false;
                });
            });
        </script>
    </body>
</html>
<?php
// ob_flush(); ?>